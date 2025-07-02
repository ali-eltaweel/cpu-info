# CPU Info

- [CPU Info](#cpu-info)
  - [Installation](#installation)
  - [Usage](#usage)
    - [Processor Fields](#processor-fields)

***

## Installation

Install *cpu-info* via Composer:

```bash
composer require ali-eltaweel/cpu-info
```

## Usage

```php
use CPUInfo\CpuInfo;

$cpuinfo = CpuInfo::local();

foreach ($cpuinfo as $processor) {

  // ...
}

$firstProcessor = $cpuinfo[0];
```

### Processor Fields

|      Field Name | Type     |
| --------------: | :------- |
|          vendor | string   |
|          family | int      |
|           model | int      |
|       modelName | string   |
|        stepping | int      |
|       microcode | int      |
|       frequency | float    |
|       cacheSize | int      |
|      physicalId | int      |
|        siblings | int      |
|          coreId | int      |
|           cores | int      |
|          apicId | int      |
|   initialApicId | int      |
|             fpu | bool     |
|    fpuException | bool     |
|      cpuidLevel | int      |
|    writeProtect | bool     |
|           flags | string[] |
|        vmxFlags | string[] |
|            bugs | string[] |
|        bogomips | float    |
|     clflushSize | int      |
|  cacheAlignment | int      |
|    addressSizes | string[] |
| powerManagement | string   |
