<?php

namespace CPUInfo;

use DTO\DataTransferObject;

/**
 * Processor Info.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package cpu-info
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 * 
 * @property-read string    $vendor
 * @property-read int       $family
 * @property-read int       $model
 * @property-read string    $modelName
 * @property-read int       $stepping
 * @property-read int       $microcode
 * @property-read float     $frequency
 * @property-read int       $cacheSize
 * @property-read int       $physicalId
 * @property-read int       $siblings
 * @property-read int       $coreId
 * @property-read int       $cores
 * @property-read int       $apicId
 * @property-read int       $initialApicId
 * @property-read bool      $fpu
 * @property-read bool      $fpuException
 * @property-read int       $cpuidLevel
 * @property-read bool      $writeProtect
 * @property-read array     $flags
 * @property-read array     $vmxFlags
 * @property-read array     $bugs
 * @property-read float     $bogomips
 * @property-read int       $clflushSize
 * @property-read int       $cacheAlignment
 * @property-read array     $addressSizes
 * @property-read string    $powerManagement
 */
final class ProcessorInfo extends DataTransferObject {

    /**
     * Creates a new processor info instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param string $vendor
     * @param int $family
     * @param int $model
     * @param string $modelName
     * @param int $stepping
     * @param int $microcode
     * @param float $frequency
     * @param int $cacheSize
     * @param int $physicalId
     * @param int $siblings
     * @param int $coreId
     * @param int $cores
     * @param int $apicId
     * @param int $initialApicId
     * @param bool $fpu
     * @param bool $fpuException
     * @param int $cpuidLevel
     * @param bool $writeProtect
     * @param array $flags
     * @param array $vmxFlags
     * @param array $bugs
     * @param float $bogomips
     * @param int $clflushSize
     * @param int $cacheAlignment
     * @param array $addressSizes
     * @param string $powerManagement
     */
    protected final function __construct(

        string $vendor,
        int    $family,
        int    $model,
        string $modelName,
        int    $stepping,
        int    $microcode,
        float  $frequency,
        int    $cacheSize,
        int    $physicalId,
        int    $siblings,
        int    $coreId,
        int    $cores,
        int    $apicId,
        int    $initialApicId,
        bool   $fpu,
        bool   $fpuException,
        int    $cpuidLevel,
        bool   $writeProtect,
        array  $flags,
        array  $vmxFlags,
        array  $bugs,
        float  $bogomips,
        int    $clflushSize,
        int    $cacheAlignment,
        array  $addressSizes,
        string $powerManagement
    ) {
        
        parent::__construct(func_get_args());
    }
}
