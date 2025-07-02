<?php

namespace CPUInfo;

use Files\RegularFile;
use DTO\DataTransferCollection;

/**
 * Cpu Info.
 * 
 * @extends DataTransferCollection<ProcessorInfo>
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package cpu-info
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class CpuInfo extends DataTransferCollection {

    private function __v(ProcessorInfo $v) {}

    /**
     * Gets the local CPU information.
     * 
     * @api
     * @final
     * @static
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @return CpuInfo|null
     */
    public static final function local(): ?self {

        $cpuInfoFile = new RegularFile('/proc/cpuinfo');

        if (!$cpuInfoFile->path->exists()) {
            
            return null;
        }

        $cpuInfo   = [];
        $processor = [];

        $handle = $cpuInfoFile->open();

        while ($line = $handle->readLine()) {

            if (empty($line = trim($line))) {

                if (count($processor) > 0) {

                    $cpuInfo[ $processor['id'] ] = $processor;
                    $processor = [];
                }

                continue;
            }

            [ $key, $value ] = array_map(trim(...), explode(':', $line, 2));

            $key = match ($key) {

                'processor'         => 'id',
                'vendor_id'         => 'vendor',
                'cpu family'        => 'family',
                'model'             => 'model',
                'model name'        => 'modelName',
                'stepping'          => 'stepping',
                'microcode'         => 'microcode',
                'cpu MHz'           => 'frequency',
                'cache size'        => 'cacheSize',
                'physical id'       => 'physicalId',
                'siblings'          => 'siblings',
                'core id'           => 'coreId',
                'cpu cores'         => 'cores',
                'apicid'            => 'apicId',
                'initial apicid'    => 'initialApicId',
                'fpu'               => 'fpu',
                'fpu_exception'     => 'fpuException',
                'cpuid level'       => 'cpuidLevel',
                'wp'                => 'writeProtect',
                'flags'             => 'flags',
                'vmx flags'         => 'vmxFlags',
                'bugs'              => 'bugs',
                'bogomips'          => 'bogomips',
                'clflush size'      => 'clflushSize',
                'cache_alignment'   => 'cacheAlignment',
                'address sizes'     => 'addressSizes',
                'power management'  => 'powerManagement',
                default             => null
            };

            if ($key === null) {

                continue;
            }

            $value = match ($key) {

                'id'            => intval($value),
                'vendor'        => $value,
                'family'        => intval($value),
                'model'         => intval($value),
                'modelName'     => $value,
                'stepping'      => intval($value),
                'microcode'     => hexdec($value),
                'frequency'     => floatval($value) * pow(2, 20),
                'cacheSize'     => intval(str_replace(' KB', '', $value)) * pow(2, 10),
                'physicalId'    => intval($value),
                'siblings'      => intval($value),
                'coreId'        => intval($value),
                'cores'         => intval($value),
                'apicId'        => intval($value),
                'initialApicId' => intval($value),
                'fpu'           => $value === 'yes',
                'fpuException'  => $value === 'yes',
                'cpuidLevel'    => intval($value),
                'writeProtect'  => $value === 'yes',
                'flags'         => array_map(trim(...), explode(' ', $value)),
                'vmxFlags'      => array_map(trim(...), explode(' ', $value)),
                'bugs'          => array_map(trim(...), explode(' ', $value)),
                'bogomips'      => floatval($value),
                'clflushSize'   => intval($value),
                'cacheAlignment' => intval($value),
                'addressSizes'  => array_map(trim(...), explode(', ', $value)),
                'powerManagement' => $value,
            };

            $processor[$key] = $value;
        }

        $handle->close();

        if (count($processor) > 0) {

            $cpuInfo[ $processor['id'] ] = $processor;
            $processor = [];
        }

        return self::fromArray($cpuInfo);
    }
}
