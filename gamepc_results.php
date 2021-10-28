<!DOCTYPE html>
<html style="font-size: 18px; font-family: Roboto, Arial, sans-serif;" lang="en">
    <head>
        <title>Guide for building a Game PC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base target="_blank">
        <style>
            @media print {
                .no-print, .no-print * {
                    display: none !important;
                }
            }
            fieldset {
              margin-top: 20px;
              background-color: #d5d8dc;
            }

            legend {
              background-color: gray;
              color: white;
              padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <div class="no-print">
            <a href="javascript:window.print();" target="_self">Print this page</a> &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;
            <a href="#clean" target="_self" onclick="document.getElementById('linux').style.display = 'none'; document.getElementById('notes').style.display = 'none'; window.print();">Print just the Products</a>
        </div>
        <!-- <header>Article from </header> -->
        <p style="font-size: 14px;">Keep in mind that currently most parts are out of stock, especially video cards, from shortages...and prices are often hundred's of dollar's higher than MSP.</p>
<?php
abstract class Funds_Level {
    const Entry = 0;
    const Mid = 1;
    const Elite = 2;
    const All = 3;
}
$user_funds = $_GET['funds'] ?? Funds_Level::All;

if ($_GET['video'] === "default") {
    if ($_GET['os'] === "win") {
        echo "<p>Video Card brand name I like for Microsoft Windows gamers: NVIDIA...</p>";
    } elseif ($_GET['os'] === "linux") {
        echo "<p>Video Card brand name I like for Linux gamers: AMD Radeon...for its open source driver support. Check to make sure your model of video card will work with your OS (as the newest cards may not have kernel support yet)!</p>";
    }
}

if ($_GET['cpu'] === "default") {
    echo "<p>I like the AMD chipset for CPU & Motherboard these days becuase of its performace / price point.....</p>";
}

if ($_GET['stream'] == "on") {
    echo "<p>Think about if you want <a href=\"https://www.nvidia.com/en-us/geforce/broadcasting/\">NVIDIA Broadcaster support</a>....if so, get NVIDIA GeForce RTX, NVIDIA TITAN RTX or NVIDIA Quadro RTX GPU</p>";
}

if ($_GET['cad'] == "on") {
    echo "Read your CAD software's guide for compatible video cards, and system requirements!";
}

class component_video {
    public $models = [];
    public function __construct($funds) {
        $this->set($funds);
    }
    public function set($funds_level): void {
        $video_cards = [ // https://videocardz.com/
            "AMD Radeon RX580" => [ "level"=>Funds_Level::Entry, "brand"=>"AMD", "size"=>8, "GDDR"=>"5", "broadcast"=>false, "cuda"=>2304, "RGB"=>false, "screen"=>"3840x2160", "playon"=>"1920x1080", "watts"=>185, "sys"=>500, "ray"=>false, "cost"=>229, "extra"=>"Memory Interface 256-bit", "Ports"=>"DisplayPort, HDMI", "monitors"=>4, "pcie"=>"PCIe Gen 3 x16 lanes", "clock"=>"Base Clock 1257MHz, Boost 1340MHz", "model_year"=>2018 ],
            "AMD Radeon RX590" => [ "level"=>Funds_Level::Entry, "brand"=>"AMD", "size"=>8, "GDDR"=>"5", "broadcast"=>false, "cuda"=>2304, "RGB"=>false, "screen"=>"3840x2160", "playon"=>"1920x1080", "watts"=>175, "sys"=>450, "ray"=>false, "cost"=>279, "extra"=>"Memory Interface 256-bit", "Ports"=>"DisplayPort, HDMI", "monitors"=>4, "pcie"=>"PCIe Gen 3 x16 lanes", "clock"=>"Base Clock 1469MHz, Boost 1545MHz", "model_year"=>2018 ],
            "AMD Radeon RX 5600 XT" => [ "level"=>Funds_Level::Entry, "brand"=>"AMD", "size"=>6, "GDDR"=>"6", "broadcast"=>false, "cuda"=>2304, "RGB"=>false, "screen"=>"4096×2160@60Hz.", "playon"=>"1920x1080", "watts"=>150, "sys"=>550, "ray"=>false, "cost"=>279, "extra"=>"Memory Interface Width 192-bit", "Ports"=>"DisplayPort, HDMI", "monitors"=>4, "pcie"=>"PCIe Gen 4 x16 lanes", "clock"=>"Base Clock 1130MHz, 1560Boost MHz", "model_year"=>2020 ],
            "AMD Radeon RX 6800" => [ "level"=>Funds_Level::Mid, "brand"=>"AMD", "size"=>16, "GDDR"=>"6", "broadcast"=>false, "cuda"=>3840, "RGB"=>false, "screen"=>"3840x2160", "watts"=>250, "sys"=>600, "ray"=>true, "cost"=>579, "extra"=>"Memory Interface 256-bit", "Ports"=>"DisplayPort, HDMI", "monitors"=>3, "pcie"=>"PCIe Gen 4.0 x16 lanes", "clock"=>"Base Clock 1700MHz, Boost 2105MHz", "model_year"=>2020 ],
            "AMD Radeon RX 6900 XT" => [ "level"=>Funds_Level::Elite, "brand"=>"AMD", "size"=>16, "GDDR"=>"6", "broadcast"=>false, "cuda"=>5120, "RGB"=>false, "screen"=>"3840x2160", "watts"=>300, "sys"=>700, "ray"=>true, "cost"=>1000, "extra"=>"Memory Interface 256-bit", "Ports"=>"DisplayPort, HDMI", "monitors"=>3, "pcie"=>"PCIe Gen 4.0 x16 lanes", "clock"=>"Base Clock 1815MHz, Boost 2250MHz", "model_year"=>2020 ],
            "NVIDIA GeForce GTX 1660 Super" => [ "level"=>Funds_Level::Entry, "brand"=>"NVIDIA", "size"=>6, "GDDR"=>"6", "broadcast"=>false, "cuda"=>1408, "RGB"=>false, "screen"=>"7680x4320@120Hz", "playon"=>"1920x1080", "watts"=>125, "sys"=>450, "ray"=>false, "cost"=>229, "extra"=>"Memory Interface Width 192-bit", "Ports"=>"DisplayPort 1.4a, HDMI 2.0b", "monitors"=>4, "pcie"=>"PCI Express 3.0 ×16", "clock"=>"Base Clock 1530MHz, Boost 1785MHz", "model_year"=>2019 ],
            "NVIDIA GeForce GTX 1070 Ti 8GB" => [ "level"=>Funds_Level::Entry, "brand"=>"NVIDIA", "size"=>8, "GDDR"=>"5", "broadcast"=>false, "cuda"=>2432, "RGB"=>false, "screen"=>"7680x4320@60Hz", "playon"=>"1920x1080", "watts"=>180, "sys"=>500, "ray"=>false, "cost"=>449, "extra"=>"Memory Interface Width 256-bit", "Ports"=>"DisplayPort, HDMI", "monitors"=>4, "pcie"=>"PCI Express 3.0 ×16", "clock"=>"Base Clock 1607MHz, Boost 1683MHz", "model_year"=>2017 ],
            "NVIDIA GeForce RTX 2070 SUPER" => [ "level"=>Funds_Level::Mid, "brand"=>"NVIDIA", "size"=>8, "GDDR"=>"6", "broadcast"=>true, "cuda"=>2560, "RGB"=>true, "screen"=>"7680x4320", "watts"=>215, "sys"=>650, "ray"=>true, "cost"=>500, "extra"=>"DLSS 2.0, Memory Interface Width 256-bit", "Ports"=>"DisplayPort 1.4, HDMI 2.0b", "monitors"=>4, "pcie"=>"PCI Express 3.0 ×16", "clock"=>"Base Clock 1605MHz, Boost 1770MHz", "model_year"=>2019 ],
            "NVIDIA GeForce RTX 2080 SUPER" => [ "level"=>Funds_Level::Mid, "brand"=>"NVIDIA", "size"=>8, "GDDR"=>"6", "broadcast"=>true, "cuda"=>3072, "RGB"=>true, "screen"=>"7680x4320", "watts"=>250, "sys"=>650, "ray"=>true, "cost"=>700, "extra"=>"DLSS 2.0, Memory Interface Width 256-bit", "Ports"=>"DisplayPort 1.4, HDMI 2.0b", "monitors"=>4, "pcie"=>"PCI Express 3.0 ×16", "clock"=>"Base Clock 1650MHz, Boost 1815MHz", "model_year"=>2019 ],
            "NVIDIA GeForce RTX 3060 TI" => [ "level"=>Funds_Level::Entry, "brand"=>"NVIDIA", "size"=>8, "GDDR"=>"6", "broadcast"=>true, "cuda"=>4864, "RGB"=>true, "screen"=>"7680x4320", "watts"=>200, "sys"=>600, "ray"=>true, "cost"=>400, "extra"=>"DLSS 2.0, Memory Interface Width 256-bit", "Ports"=>"DisplayPort 1.4a, HDMI 2.1", "monitors"=>4, "pcie"=>"PCI Express 4.0 ×16", "clock"=>"Base Clock 1410MHz, Boost 1665MHz", "model_year"=>2020 ],
            "NVIDIA GeForce RTX 3070" => [ "level"=>Funds_Level::Mid, "brand"=>"NVIDIA", "size"=>8, "GDDR"=>"6", "broadcast"=>true, "cuda"=>5888, "RGB"=>true, "screen"=>"7680x4320", "watts"=>220, "sys"=>650, "ray"=>true, "cost"=>500, "extra"=>"DLSS 2.0, Memory Interface Width 256-bit", "Ports"=>"DisplayPort 1.4, HDMI 2.1", "monitors"=>4, "pcie"=>"PCI Express 4.0 ×16", "clock"=>"Base Clock 1500MHz, Boost 1725MHz", "model_year"=>2020 ],
            "NVIDIA GeForce RTX 2080TI" => [ "level"=>Funds_Level::Elite, "brand"=>"NVIDIA", "size"=>11, "GDDR"=>"6", "broadcast"=>true, "cuda"=>4352, "RGB"=>true, "screen"=>"7680x4320", "watts"=>260, "sys"=>700, "ray"=>true, "cost"=>1200, "extra"=>"DLSS 2.0, Memory Interface Width 352-bit", "Ports"=>"DisplayPort 1.4, HDMI 2.0b", "monitors"=>4, "pcie"=>"PCI Express 3.0 ×16", "clock"=>"Base Clock 1350MHz, Boost 1545MHz", "model_year"=>2018 ],
            "NVIDIA GeForce RTX 3080" => [ "level"=>Funds_Level::Elite, "brand"=>"NVIDIA", "size"=>10, "GDDR"=>"6X", "broadcast"=>true, "cuda"=>8704, "RGB"=>true, "screen"=>"7680x4320", "watts"=>320, "sys"=>750, "ray"=>true, "cost"=>700, "extra"=>"DLSS 2.0, Memory Interface Width 320-bit", "Ports"=>"DisplayPort 1.4, HDMI 2.0b", "monitors"=>4, "pcie"=>"PCI Express Gen 4", "clock"=>"Base Clock 1440MHz, Boost 1710MHz", "model_year"=>2020 ],
            "NVIDIA GeForce RTX 3090" => [ "level"=>Funds_Level::Elite, "brand"=>"NVIDIA", "size"=>24, "GDDR"=>"6X", "broadcast"=>true, "cuda"=>10496, "RGB"=>true, "screen"=>"7680x4320", "watts"=>350, "sys"=>750, "ray"=>true, "cost"=>1500, "extra"=>"DLSS 2.0, Memory Interface Width 384-bit", "Ports"=>"DisplayPort 1.4, HDMI 2.0b", "monitors"=>4, "pcie"=>"PCI Express Gen 4", "clock"=>"Base Clock 1395MHz, Boost 1695MHz", "model_year"=>2020 ],
        ];

        foreach($video_cards as $model=>$card) {
            $level = $card["level"] ?? 9;
            $brand = $card["brand"] ?? "default";
            $video = $_GET["video"] ?? "default";
            if (trim($video) == "amd" && $brand !== "AMD") continue;
            if (trim($video) == "nvidia" && $brand !== "NVIDIA") continue;
            if ($level == $funds_level) {
                $this->models[$model] = $card;
            }
        }
    }
    public function get(): string {
        $ret = "";
        foreach($this->models as $model=>$card) {
            $brand = $card["brand"] ?? "unknown";
            $gb = $card["size"] ?? "unknown";
            $ddr = $card["GDDR"] ?? "unknown";
            $broadcaster = $card["broadcast"] ?? false;
            $broadcaster = ($broadcaster) ? "yes" : "no";
            $cuda_cores = $card["cuda"] ?? "unknown";
            $rgb = $card["RGB"] ?? false;
            $rgb = ($rgb) ? "yes" : "no";
            $screen = $card["screen"] ?? "unknown";
            $best_play_on = $card["playon"] ?? "";
            if (! empty($best_play_on)) {
                $best_play_on = "Best to play on: {$best_play_on}, ";
            }
            $watts = $card["watts"] ?? "unknown";
            $min_system_watts = $card["sys"] ?? "unknown";
            $ray_trace = $card["ray"] ?? false;
            $ray_trace = ($ray_trace) ? "yes" : "no";
            $cost = $card["cost"] ?? "unknown";
            $extra = $card["extra"] ?? "";
            if (! empty ($extra)) {
                $extra .= ", ";
            }
            $ports = $card["Ports"] ?? "HDMI";
            $monitors = $card["monitors"] ?? "2";
            $pcie = $card["pcie"] ?? "unknown";
            $clock = $card["clock"] ?? "unknown";
            $year = $card["model_year"] ?? "unknown";
            $cores = ($brand == "AMD") ? "Stream Processor" : "CUDA";
            $ret .= "Chipset Brand: <i>{$brand}</i>, Cost <b>\${$cost}</b>, Model: <u>{$model}</u>, GRAM <b style=\"color: green;\">{$gb}GB</b> - GDDR{$ddr}, <br/> - Supports Broadcaster: {$broadcaster}, <i style=\"color: blue;\">{$cores} Cores: {$cuda_cores}</i>, RGB Lights: {$rgb}, Max Screen Resolution: {$screen}, <br/> - {$best_play_on}<font style=\"color: red;\">{$watts} watts</font> used, Computer Power Supply Unit needs to be over: {$min_system_watts}watts, Ray Tracing: {$ray_trace},<br/> - {$extra}Ports: {$ports}, Max Monitors: {$monitors}, {$pcie},<br/> - {$clock}, Model released in: {$year}" . PHP_EOL;
        }
        return $ret;
    }
}

class component_memory {
    public $models = [];
    public function __construct($funds) {
        $this->set($funds);
    }
    public function set($funds_level): void {
        $memory_sticks = [
            "Patriot Viper Elite 8GB DDR4-2400MHz" => [ "level"=>Funds_Level::Entry, "cost"=>36, "size"=>8, "DDR"=>"4", "speed"=>"2400MHz", "cas"=>"CAS Latency: 15", "timing"=>"Timing: 15-15-15-35", "dimms"=>"DIMMs: 2x 4GB", "volts"=>"Voltage: 1.2V", "rgb"=>false ],
            "G.Skill Ripjaws V 16GB DDR4-2400MHz" => [ "level"=>Funds_Level::Entry, "cost"=>60, "size"=>16, "DDR"=>"4", "speed"=>"2400MHz", "cas"=>"CAS Latency: 15", "timing"=>"Timing: 15-15-15-35", "dimms"=>"DIMMs: 2x 8GB", "volts"=>"Voltage: 1.2V", "rgb"=>false ],
            "Crucial Ballistix 16GB DDR4-3200MHz" => [ "level"=>Funds_Level::Entry, "cost"=>75, "size"=>16, "DDR"=>"4", "speed"=>"3200MHz", "cas"=>"CAS Latency: 16", "timing"=>"Timing: 16-18-18", "dimms"=>"DIMMs: 2x 8GB", "volts"=>"Voltage: 1.35V", "rgb"=>true ],
            "TEAM XTREEM ARGB 16GB DDR4-3600MHz" => [ "level"=>Funds_Level::Mid, "cost"=>170, "size"=>16, "DDR"=>"4", "speed"=>"3600MHz", "cas"=>"CAS Latency: 14", "timing"=>"Timing: 14-15-15-35", "dimms"=>"DIMMs: 2x 8GB", "volts"=>"Voltage: 1.45v", "rgb"=>true ],
            "Corsair Dominator Platinum RGB 32GB DDR4-3200MHz" => [ "level"=>Funds_Level::Mid, "cost"=>180, "size"=>32, "DDR"=>"4", "speed"=>"3200MHz", "cas"=>"CAS Latency: 16", "timing"=>"Timing: 16-18-18-36", "dimms"=>"DIMMs: 2x 16GB", "volts"=>"Voltage: 1.35V", "rgb"=>true ],
            "G.Skill Trident Z Neo 32GB DDR4-3600MHz" => [ "level"=>Funds_Level::Elite, "cost"=>100, "brand"=>"AMD", "size"=>32, "DDR"=>"4", "speed"=>"3600MHz", "cas"=>"CAS Latency: 18", "timing"=>"Timing: 18-22-22-42", "dimms"=>"DIMMs: 2x 16GB", "volts"=>"Voltage: 1.35V", "rgb"=>true ],
            "G.Skill Trident Z Royal 16GB DDR4-4000MHz" => [ "level"=>Funds_Level::Elite, "cost"=>250, "brand"=>"Intel", "size"=>16, "DDR"=>"4", "speed"=>"4000MHz", "cas"=>"CAS Latency: 15", "timing"=>"Timing: 15-16-16-36", "dimms"=>"DIMMs: 2x 8GB", "volts"=>"Voltage: 1.5V", "rgb"=>false ],
            "TEAMGROUP T-Force Xtreem Samsung IC 16GB Kit DDR4-4133MHz" => [ "level"=>Funds_Level::Elite, "cost"=>120, "brand"=>"Intel", "size"=>16, "DDR"=>"4", "speed"=>"4133MHz", "cas"=>"CAS Latency: 18", "timing"=>"Timing: 18-18-18-38", "dimms"=>"DIMMs: 2x 8GB", "volts"=>"Voltage: 1.4V", "rgb"=>false ],
        ];

        foreach($memory_sticks as $model=>$card) {
            $level = $card["level"] ?? 9;
            $brand = $card["brand"] ?? "default";
            $cpu = $_GET["cpu"] ?? "default";
            if ($level == $funds_level) {
                if ($cpu == "amd" && $brand == "Intel") continue;
                if ($cpu == "intel" && $brand == "AMD") continue;
                $this->models[$model] = $card;
            }
        }
    }
    public function get(): string {
        $ret = "";
        foreach($this->models as $model=>$card) {
            $brand = $card["brand"] ?? null;
            if (! empty($brand)) {
                $brand = "For " . $brand . ", ";
            }
            $gb = $card["size"] ?? "unknown";
            $cost = $card["cost"] ?? "unknown";
            $ddr = $card["DDR"] ?? "unknown";
            $speed = $card["speed"] ?? "unknown";
            $cas = $card["cas"] ?? "unknown";
            $timing = $card["timing"] ?? "unknown";
            $dimms =  $card["dimms"] ?? "unknown";
            $volts =  $card["volts"] ?? "unknown";
            $rgb = $card["RGB"] ?? false;
            $rgb = ($rgb) ? "yes" : "no";
            $ret .= "<i>{$brand}</i>Cost <b>\${$cost}</b>, Model: <u>{$model}</u><br/> - RAM <b style=\"color: green;\">{$gb}GB</b> - DDR{$ddr} - Frequency/Speed: <i style=\"color: blue;\">{$speed}, {$cas}</i>, RGB Lights: {$rgb}, Timing: {$timing}, <br/> - {$dimms}, {$volts}" . PHP_EOL;
        }
        return $ret;
    }
}

class component_cpu {
    public $models = [];
    public function __construct($funds) {
        $this->set($funds);
    }
    public function set($funds_level): void {
        $processors = [
            "AMD Ryzen 5 3600" => [ "level"=>Funds_Level::Entry, "brand"=>"AMD", "cores"=>6, "threads"=>12, "socket"=>"AM4", "architecture"=>"Zen 2", "speed"=>"3.6GHz", "boost"=>"4.2GHz", "cache"=>"(Total L1 Cache: 384KB, Total L2 Cache: 3MB, Total L3 Cache: 32MB)", "ram"=>"DDR4", "memory_support"=>"Up to 3200MHz", "RGB"=>false, "model_year"=>"2019", "watts"=>65, "cost"=>200, "pcie"=>"PCI Express Version 4 Ready - x16 lanes" ],
            "AMD Ryzen 7 3800X" => [ "level"=>Funds_Level::Mid, "brand"=>"AMD", "cores"=>8, "threads"=>16, "socket"=>"AM4", "architecture"=>"Zen 3", "speed"=>"3.9GHz", "boost"=>"4.5GHz", "cache"=>"(Total L1 Cache: 512KB, Total L2 Cache: 4MB, Total L3 Cache: 32MB)", "ram"=>"DDR4", "memory_support"=>"Up to 3200MHz", "RGB"=>false, "model_year"=>"2019", "watts"=>105, "cost"=>410, "pcie"=>"PCI Express Version 4 - x16 lanes" ],
            "AMD Ryzen 9 3900X" => [ "level"=>Funds_Level::Elite, "brand"=>"AMD", "cores"=>12, "threads"=>24, "socket"=>"AM4", "architecture"=>"Zen 3", "speed"=>"3.8GHz", "boost"=>"4.6GHz", "cache"=>"(Total L1 Cache: 768KB, Total L2 Cache: 6MB, Total L3 Cache: 64MB)", "ram"=>"DDR4", "memory_support"=>"Up to 3200MHz", "RGB"=>false, "model_year"=>"2019", "watts"=>105, "cost"=>500, "pcie"=>"PCI Express Version 4 - x16 lanes" ],
            "AMD Ryzen 9 3950X" => [ "level"=>Funds_Level::Elite, "brand"=>"AMD", "cores"=>16, "threads"=>32, "socket"=>"AM4", "architecture"=>"Zen 3", "speed"=>"3.5GHz", "boost"=>"4.2GHz", "cache"=>"(Total L1 Cache: 1MB, Total L2 Cache: 8MB, Total L3 Cache: 64MB)", "ram"=>"DDR4", "memory_support"=>"Up to 3200MHz", "RGB"=>false, "model_year"=>"2020", "watts"=>105, "cost"=>720, "pcie"=>"PCI Express Version 4 - x16 lanes" ],
            //"AMD Ryzen 9 5950X" => [ "level"=>Funds_Level::Elite, "brand"=>"AMD", "cores"=>16, "threads"=>32, "socket"=>"AM4", "architecture"=>"Zen 3", "speed"=>"3.4GHz", "boost"=>"4.9GHz", "cache"=>"(Total L2 Cache: 8MB, Total L3 Cache: 64MB)", "ram"=>"DDR4", "memory_support"=>"Up to 3200MHz", "RGB"=>false, "model_year"=>"2020", "watts"=>105, "cost"=>1300, "pcie"=>"PCI Express Version 4 - x16 lanes" ],            
            "Intel Core i5 10400F" => [ "level"=>Funds_Level::Entry, "brand"=>"Intel", "cores"=>6, "threads"=>12, "socket"=>"FCLGA1200", "architecture"=>"10th Generation", "speed"=>"2.9GHz", "boost"=>"4.3GHz", "cache"=>"(12 MB Intel Smart Cache)", "ram"=>"DDR4", "memory_support"=>"DDR4-2666", "RGB"=>false, "model_year"=>"2020", "watts"=>65, "cost"=>155, "pcie"=>"PCI Express Version 3 - x16 lanes" ],
            "Intel Core i7 10700K" => [ "level"=>Funds_Level::Mid, "brand"=>"Intel", "cores"=>8, "threads"=>16, "socket"=>"FCLGA1200", "architecture"=>"10th Generation", "speed"=>"3.8GHz", "boost"=>"5.1GHz", "cache"=>"(16 MB Intel Smart Cache)", "ram"=>"DDR4", "memory_support"=>"DDR4-2933", "RGB"=>false, "model_year"=>"2020", "watts"=>125, "cost"=>380, "pcie"=>"PCI Express Version 3 - x16 lanes" ],
            "Intel Core i9 10900K" => [ "level"=>Funds_Level::Elite, "brand"=>"Intel", "cores"=>10, "threads"=>20, "socket"=>"FCLGA1200", "architecture"=>"10th Generation", "speed"=>"3.7GHz", "boost"=>"5.3GHz", "cache"=>"(16 MB Intel Smart Cache)", "ram"=>"DDR4", "memory_support"=>"DDR4-2933", "RGB"=>false, "model_year"=>"2020", "watts"=>125, "cost"=>490, "pcie"=>"PCI Express Version 3 - x16 lanes" ],
        ];

        foreach($processors as $model=>$card) {
            $level = $card["level"] ?? 9;
            $brand = $card["brand"] ?? "default";
            $cpu = $_GET["cpu"] ?? "default";
            if ($level == $funds_level) {
                if ($cpu == "amd" && $brand == "Intel") continue;
                if ($cpu == "intel" && $brand == "AMD") continue;
                $this->models[$model] = $card;
            }
        }
    }

    public function get(): string {
        $ret = "";
        foreach($this->models as $model=>$card) {
            $brand = $card["brand"] ?? null;
            if (! empty($brand)) {
                $brand = "Chipset " . $brand . ", ";
            }
            $cores = $card["cores"] ?? "unknown";
            $threads = $card["threads"] ?? "unknown";
            $socket = $card["socket"] ?? "unknown";
            $architecture = $card["architecture"] ?? "unknown";
            $speed =  $card["speed"] ?? "unknown";
            $boost =  $card["boost"] ?? "unknown";
            $cache = $card["cache"] ?? "unknown";
            $spec = $card["memory_support"] ?? "unknown";
            $type = $card["ram"] ?? "unknown";
            $cost = $card["cost"] ?? "unknown";
            $rgb = $card["RGB"] ?? false;
            $rgb = ($rgb) ? "yes" : "no";
            $watts = $card["watts"] ?? "unknown";
            $year = $card["model_year"] ?? "unknown";
            $ret .= "<i>{$brand}</i>Cost <b>\${$cost}</b>, Model: <u>{$model}</u>, <b style=\"color: green;\">Cores: {$cores}, Threads: {$threads}</b>, Socket: {$socket},<br/> - Architecture: {$architecture}, <font style=\"color: red;\">{$watts} watts</font> used, Speed: {$speed}, Boost: {$boost}, <br/> - System Memory Specification: {$spec}, System Memory Type: {$type},<br/> - Cache: <i style=\"color: blue;\">{$cache}</i>, RGB Lights: {$rgb}, Model release in: {$year}" . PHP_EOL;
        }
        return $ret;
    }
}

class component_motherboard {
    public $models = [];
    public function __construct($funds) {
        $this->set($funds);
    }
    public function set($funds_level): void {
        $motherboards = [
            "" => [ "level"=>Funds_Level::Entry, "brand"=>"AMD", "size"=>8, "GDDR"=>"5", "broadcast"=>false, "cuda"=>2304, "RGB"=>false, "screen"=>"3840x2160", "playon"=>"1920x1080", "watts"=>185, "sys"=>500, "ray"=>false, "cost"=>229, "extra"=>"", "Ports"=>"DisplayPort, HDMI", "monitors"=>4, "pcie"=>"PCIe Gen 3 x16 lanes" ],
            "" => [ "level"=>Funds_Level::Entry, "brand"=>"AMD", "size"=>8, "GDDR"=>"5", "broadcast"=>false, "cuda"=>2304, "RGB"=>false, "screen"=>"3840x2160", "playon"=>"1920x1080", "watts"=>175, "sys"=>450, "ray"=>false, "cost"=>279, "extra"=>"", "Ports"=>"DisplayPort, HDMI", "monitors"=>4, "pcie"=>"PCIe Gen 3 x16 lanes" ],
            "" => [ "level"=>Funds_Level::Mid, "brand"=>"INTEL", "size"=>16, "GDDR"=>"6", "broadcast"=>false, "cuda"=>3840, "RGB"=>false, "screen"=>"3840x2160", "watts"=>250, "sys"=>600, "ray"=>false, "cost"=>579, "extra"=>"", "Ports"=>"DisplayPort, HDMI", "monitors"=>3, "pcie"=>"PCIe Gen 4.0 x16 lanes" ],
        ];
    }

    public function get(): string {

    }

}

class component_storage {
    public $models = [];
    public function __construct($funds) {
        $this->set($funds);
    }
    public function set($funds_level): void {
        $drives = [
            "Samsung 970 EVO SSD 500GB - M.2 NVMe" => [ "level"=>Funds_Level::Entry, "Size"=>"500GB", "Type"=>"M.2 NVMe", "Interface"=>"PCIe Gen 3.0 x4, NVMe 1.3 ", "Read_Speed"=>"up to 3500MB/s", "RGB"=>"no", "Cost"=>"<b>$60 to $110</b>", "Form_factor"=>"M.2(2280)" ],
            "Corsair Force Series MP600 1TB Gen4 PCIe X4 NVMe M.2 SSD" => [ "level"=>Funds_Level::Mid, "Size"=>"1TB", "Type"=>"M.2 NVMe", "Interface"=>"PCIe Gen 4.0 x4, NVMe", "Read_Speed"=>"up to 4950MB/s", "RGB"=>"no", "Cost"=>"<b>$190 to $250</b>", "Form_factor"=>"M.2(2280)" ],
            "Corsair Force Series MP600 2TB Gen4 PCIe X4 NVMe M.2 SSD" => [ "level"=>Funds_Level::Elite, "Size"=>"2TB", "Type"=>"M.2 NVMe", "Interface"=>"PCIe Gen 4.0 x4, NVMe", "Read_Speed"=>"up to 4950MB/s", "RGB"=>"no", "Cost"=>"<b>$380 to $450</b>", "Form_factor"=>"M.2(2280)" ],
        ];

        foreach($drives as $model=>$card) {
            $level = $card["level"] ?? 9;
            if ($level == $funds_level) {
                $this->models[$model] = $card;
            }
        }
    }

    public function get(): string {
        $ret = "";
        foreach($this->models as $model=>$card) {
            $ret .= "<u>{$model}</u>" . PHP_EOL . " - ";
            foreach($card as $item=>$value) {
                if ($item == "level") continue;
                $ret .= "{$item}: {$value}, ";
                if ($item == "RGB") $ret .= "<br/> - ";
            }
        }
        $ret = rtrim($ret, ", ");
        if ($_GET['backups'] == "on") {
            $ret .= PHP_EOL . "* Plus - add a Backup Drive: Crucial 2TB SATA 2.5-Inch Internal SSD, up to 540MB/s, Cost under $200.";
        }
        return $ret;
    }
}

class cpu {
    public $info = "To pick a CPU, look at the amount of Cache on board, Chache is KING as it reduces load times." . PHP_EOL;

    public function __construct($funds) {
        $this->set($funds);
    }

    public function set($funds_level): void {
        switch ($funds_level) {
            case Funds_Level::Entry :
                $this->info .= " - Speed/Frequency of CPU's aim for above 2.5GHz and has 6 or more cores.";
            break;
            case Funds_Level::Mid :
                $this->info .= " - Speed/Frequency of CPU's aim for above 3.5GHz and has 8 or more cores.";
            break;
            case Funds_Level::Elite :
                $this->info .= " - Speed/Frequency of CPU's aim for above 3.5GHz and has 10 or more cores.";
            break;
            default;
                $this->info .= " - Speed/Frequency of CPU's aim for above 2.5GHz and has 6 or more cores.";
            break;

        }
    }

    public function get(): string {
        return $this->info . PHP_EOL;
    }

}

class psu {
    public $minimum_wattage = 650;
    public $cat = ["80 PLUS"];
    public $modular = "";

    public function __construct($funds) {
        $this->set($funds);
    }

    public function set($funds_level): void {
        switch ($funds_level) {
            case Funds_Level::Entry :
                $this->minimum_wattage = 700;
                $this->cat = ["80 PLUS Bronze", "80 PLUS Silver", "80 PLUS Gold"];
                $this->modular = "";
            break;
            case Funds_Level::Mid :
                $this->minimum_wattage = 850;
                $this->cat = ["80 PLUS Gold", "80 PLUS Platinum"];
                $this->modular = "<br/> -   If not much more, its nice to get modular wiring.";
            break;
            case Funds_Level::Elite :
                $this->minimum_wattage = 1000;
                $this->cat = ["80 PLUS Gold", "80 PLUS Platinum", "80 PLUS Titanium"];
                $this->modular = "<br/> -   Its nice to get modular wiring.";
            break;
            default :
                $this->minimum_wattage = 650;
                $this->cat = ["80 PLUS"];
                $this->modular = "";
            break;
        }
    }

    public function get(): string {
        $levels = "";
        foreach($this->cat as $cat) {
            $levels .= $cat . ", or ";
        }
        $levels = rtrim($levels, ", or ");
        return "For the Power Supply Unit (PSU): Aim for over {$this->minimum_wattage} watts, Certification Levels: [{$levels}]. {$this->modular}" . PHP_EOL;
    }

}

class ram {
    public $minimum_size_in_gb = 8;
    public $kind = ["DDR3", "DDR4"];
    public $speed = "4133MHz";
    public $details = "";

    public function __construct($funds) {
        $this->set($funds);
    }

    public function set($funds_level): void {
        switch ($funds_level) {
            case Funds_Level::Entry :
                $this->minimum_size_in_gb = 8;
                $this->kind = ["DDR4"];
                $this->speed = "2400MHz to 3200MHz (higher is faster)";
                $this->details = ($_GET['cad'] == "on") ? ", CAD software requires a mid level funding...! A good CPU, lots of RAM, and a great video card!" : "";
            break;
            case Funds_Level::Mid :
                $this->minimum_size_in_gb = 16;
                $this->kind = ["DDR4"];
                $this->speed = "3200MHz to 3600MHz (higher is faster)";
                $this->details = ($_GET['cad'] == "on") ? ", Read your CAD software recommended size for RAM!" : "";
            break;
            case Funds_Level::Elite :
                $this->minimum_size_in_gb = 32;
                $this->kind = ["DDR4"]; // , "DDR5"
                $this->speed = "~4133MHz for Intel, or 3600MHz for AMD";
                $this->details = ($_GET['cad'] == "on") ? ", You even may want 64GB or higher!" : "";
            break;
            default :
                $this->minimum_size_in_gb = 8;
                $this->kind = ["DDR4"];
                $this->speed = "3200MHz";
                $this->details = ($_GET['cad'] == "on") ? ", CAD software requires a mid level funding...! A good CPU, lots of RAM, and a great video card!" : "";
            break;
        }
    }

    public function get(): string {
        $levels = "";
        foreach($this->kind as $kind) {
            $levels .= $kind . ", or ";
        }
        $levels = rtrim($levels, ", or ");
        return "For the Memory RAM: Aim for over {$this->minimum_size_in_gb}GB in size, Kind: [{$levels}], Rated at: {$this->speed} {$this->details}." . PHP_EOL;
    }

}

class monitor {
    public $resolution = "1080p HD";
    public $refresh_rate_in_hertz = [120];
    public $details = "";

    public function __construct($funds) {
        $this->set($funds);
    }

    public function set($funds_level): void {
        switch ($funds_level) {
            case Funds_Level::Entry :
                $this->refresh_rate_in_hertz = [120, 144];
                $this->resolution = "1080p HD";
            break;
            case Funds_Level::Mid :
                $this->refresh_rate_in_hertz = [144, 240];
                $this->resolution = "1080p HD or 1440p Quad-HD";
            break;
            case Funds_Level::Elite :
                $this->refresh_rate_in_hertz = [240, 300];
                $this->resolution = "1440p Quad-HD or 4K if refresh rate is high?";
            break;
            default :
                $this->resolution = "1080p HD";
                $this->refresh_rate_in_hertz = [120];
            break;
        }

        if ($_GET['cad'] == "on" || $_GET['coder'] == "on" || $_GET['stream'] == "on") {
            $this->details = PHP_EOL . "You may want to get one 4K monitor for work and one 1440p Quad-HD monitor for gamming...?";
        }

    }

    public function get(): string {
        $levels = "";
        foreach($this->refresh_rate_in_hertz as $kind) {
            $levels .= $kind . ", or ";
        }
        $levels = rtrim($levels, ", or ");
        return "For the Monitor: A screen size of {$this->resolution}, Refresh Rate in Hz, above: [{$levels}] {$this->details}." . PHP_EOL;
    }

}

class video {
    public $minimum_size_in_gb = 4;
    public $kind = ["GDDR5", "GDDR6"];
    public $cores = 1500;

    public function __construct($funds) {
        $this->set($funds);
    }

    public function set($funds_level): void {
        switch ($funds_level) {
            case Funds_Level::Entry :
                $this->minimum_size_in_gb = 6;
                $this->kind = ["GDDR5"];
                $this->cores = 2000;
            break;
            case Funds_Level::Mid :
                $this->minimum_size_in_gb = 8;
                $this->kind = ["GDDR5", "GDDR6"];
                $this->cores = 2500;
            break;
            case Funds_Level::Elite :
                $this->minimum_size_in_gb = 12;
                $this->kind = ["GDDR5", "GDDR6"];
                $this->cores = 3500;
            break;
            default :
                $this->minimum_size_in_gb = 4;
                $this->kind = ["GDDR4", "GDDR5"];
            break;
        }
    }

    public function get(): string {
        $levels = "";
        foreach($this->kind as $kind) {
            $levels .= $kind . ", or ";
        }
        $levels = rtrim($levels, ", or ");
        return "For the Video Card: Aim for over {$this->minimum_size_in_gb}GB, Kind: [{$levels}], Stream/CUDA Cores over {$this->cores}." . PHP_EOL;
    }

}

class storage {
    public $minimum_size = "512GB";
    public $kind = "NVMe M.2";
    public $details = "";

    public function __construct($funds) {
        $this->set($funds);
    }

    public function set($funds_level): void {
        switch ($funds_level) {
            case Funds_Level::Entry :
                $this->minimum_size = "512GB";
                $this->kind = "NVMe M.2";
            break;
            case Funds_Level::Mid :
                $this->minimum_size = "1TB";
                $this->kind = "NVMe PCIe Gen4 M.2";
            break;
            case Funds_Level::Elite :
                $this->minimum_size = "1TB";
                $this->kind = "NVMe PCIe Gen4 M.2";
            break;
            default :
                $this->minimum_size = "512GB";
                $this->kind = "NVMe M.2";
            break;
        }
        $this->details = ($_GET['backups'] == "on") ? "Get an extra SSD...drive for backups." : "";
    }

    public function get(): string {
        return "For Storage Drive: Aim for over {$this->minimum_size}, Kind: [{$this->kind}] {$this->details}." . PHP_EOL;
    }

}

function show_upgrades() {
    $mid_args = "";
    foreach($_GET as $key=>$value) {
        if ($key == "funds") {
            $mid_args .= "funds=" . Funds_Level::Mid . "&";
        } else {
            $mid_args .= "{$key}={$value}&";
        }
    }
    $mid_args = rtrim($mid_args, "&");
    $elite_args = str_replace("funds=" . Funds_Level::Mid . "&",  "funds=" . Funds_Level::Elite . "&", $mid_args);

    $orig = $_GET["funds"] ?? "unknown";
    if ($orig == Funds_Level::Entry) echo "<div class=\"no-print\">These video cards are sub-par and old...they are fine if you have no need for the latest titles,<br/> - don't need 4K, or care about FPS or refresh rates.<br/> - <a href=\"?{$mid_args}\">Show me Mid Level 1080p/1440p Cards</a> &nbsp; - &nbsp; <a href=\"?{$elite_args}\">Show me Elite Level 4K Cards</a><br/><br/></div>";
    if ($orig == Funds_Level::Mid) echo "<div class=\"no-print\"><a href=\"?{$elite_args}\">Show me the Elite Level 4K Cards</a><br/><br/></div>";
}

function show_level($user_funds) {
    echo "<h3>Specs";
    if ($user_funds == Funds_Level::Entry) echo " for Entry level Gamer:";
    if ($user_funds == Funds_Level::Mid) echo " for Mid level Gamer budget:";
    if ($user_funds == Funds_Level::Elite) echo " for the Elite Gamer (no limit for the budget):";
    echo "</h3><pre>";

    $cores = new cpu($user_funds);
    $psu = new psu($user_funds);
    $ram = new ram($user_funds);
    $monitor = new monitor($user_funds);
    $video = new video($user_funds);
    $storage = new storage($user_funds);
    $card = new component_video($user_funds);
    $memory = new component_memory($user_funds);
    $cpu = new component_cpu($user_funds);
    $drives = new component_storage($user_funds);

    echo $cores->get();
    echo $video->get();
    echo $ram->get();
    echo $psu->get();
    echo $monitor->get();
    echo $storage->get();

    echo "<h4>Main component \"ideas\" for build:</h4>";
    echo "<fieldset><legend>Video/Graphics Card Selection (pick one):</legend>";
//    show_upgrades();
    echo $card->get();
    echo "</fieldset>";
    echo "<fieldset><legend>System Memory Selection (pick one):</legend>";
    echo $memory->get();
    echo "</fieldset>";
    echo "<fieldset><legend>Main Processor the CPU (pick one):</legend>";
    echo $cpu->get();
    echo "</fieldset>";
    echo "<fieldset><legend>Storage Drive:</legend>";
    echo $drives->get();
    echo "</fieldset>";
    echo "</pre>";
}

if ($user_funds == Funds_Level::All) {
    echo "<br/>Begin Comparing Levels here::::<hr size=\"50%\">";
    for ($x = Funds_Level::Entry; $x <= Funds_Level::Elite; $x++) {
        show_level($x);
        echo "<hr>";
    }
    echo "End of comparing levels::::<hr size=\"50%\">";
} else {
    show_level($user_funds);
}

?>
<p>Ordering checklist:<input type="checkbox"/> monitor,<input type="checkbox"/> keyboard,<input type="checkbox"/> mouse,<input type="checkbox"/> case,<input type="checkbox"/> power supply,<input type="checkbox"/> CPU,<input type="checkbox"/> motherboard,<input type="checkbox"/> RAM, and <input type="checkbox"/> storage drive.<input type="checkbox"/> Did your CPU come with a heat-sink?</p>
<p>Ensure, your Power Supply Unit can handle the wattage of your parts. Some find the Bronze rating to be really loud; -- So, for a silent build then go with Gold or maybe Platinum PSU.</p>
<p><font style="color: darkred; text-decoration-line: underline; text-decoration-style: double;">Make sure, the CPU socket type, Brand, and Generation are compatible with your motherboard!</font></p>
<p>Verify that your video card has a PCIe type that will match for your motherboard's free slot IE: PCI Express 4.0 x 16 lanes.</p>
<p>Double check that your RAM type will work on with your motherboard IE: DDR4....Form Factors: DIMM (AKA UDIMM) for Desktops and SODIMM is for Laptops! UDIMM is unbuffered common for Desktops and RDIMM is Buffered (registered) common is Servers. So they are not compatible with each other. If your motherboard doesn't support Registered memory then you can't use it.</p>
<p>Are your case & motherboard the same Form Factor (ATX 12"x9.6", Micro ATX 11.2"x8.2", or Mini ITX 6.7"x6.7")?</p>
<p>About Power Supply Units (PSU): <i>The newest standard, ATX12V v2.4, has been in use since 2013.</i> These newer ATX12V 2.x standard uses a 24-pin connector for the motherboards power. ATX12V and ATX PSUs both share the same physical shape and size. You may be asking, what about the Mini-ITX standard? It does not define an electrical standard for the power supply...Which means size & layout of PSU depends only on if it will fix in the case.</p>
<p>To clarify: ATX12V-compliant power supplies, although they have 24 pins, can actually be used on an ATX motherboard that has a 20-pin connector.... If you have an ATX power supply that therefore has a 20-pin connector, it won't work with a newer motherboard that requires all 24 pins to be connected.</p>
<p>For a ATX or Micro ATX case, just grab any ATX12V PSU with the appropriate Wattage and Efficiency Certification Level you desire.</p>
<p>For Mini ITX case and motherboard, try to get a power supply with the case that meets your Wattage requirements.</p>
<?php
if ($_GET['stream'] == "on") {
    if ( $user_funds == Funds_Level::Elite ) {
        echo "Don't forget to pick up a Elgato Cam Link 4K USB 3 HDMI Capture Device or PCIe 4k HDMI Capture Card," . PHP_EOL . " for a fancy DSLR Camera (make sure it can stay powered on for hours, no auto-power-off...).";
    } else {
        echo "Don't forget to get a (USB or PCIe) HDMI capture card and clean HDMI camera, or cheap USB 1080p Logitech Web Cam." . PHP_EOL . "Download a free OBS software program for your streams, google it...";
    }
    echo PHP_EOL . "If you want to record a game console, make sure your capture device does HDMI passthrough (has an HDMI IN and OUT).";
}
if ($_GET['cad'] == "on") {
    echo PHP_EOL . "See CAD owners manual about software/hardware compatibility...";
}
?>
<article id="notes">
Performance Notes: <a href="#" onclick="document.getElementById('notes').style.display = 'none';" class="no-print">Hide these notes (about RAM, monitor, etc... types below), I get it...</a>
<?php
if ( $user_funds == Funds_Level::Elite ) {
    echo "You may want to buy things with RGB lighting and custom Water cooling systems...if you like those sorts of things.." . PHP_EOL;
}
?>
<p>The chipset brand of video card should not matter too much, its personal preferences...However, the Motherboard must accept the brand/socket/generation type of CPU!</p>
<p>A whole heap of video card manufactures exist, here are a few: AMD Radeon RX Series - cards made by (AMD, AsRock, Sapphire, Gigabyte, MSI, ASUS, and XFX), and NVIDIA GeForce Series - cards made by (NVIDIA, EVGA, Gigabyte, MSI, and ASUS).</p>
<p>Good brands for power supply's: EVGA, Corsair, SeaSonic, Cooler Master, and XFX.</p>
<p>Nice brands for computer cases: Corsair, Fractal Design, Nanoxia, Cooler Master, and Phanteks. <a href="https://www.tomshardware.com/reviews/best-pc-cases,4183.html">Find a specific case</a></p>
<p>Lots of Video Stream Processing cores or Compute Unified Device Architecture (<a title="Nvidia CUDA cores are parallel or separate processing units within the GPU, with more cores generally equating to better performance."><u>CUDA</u></a>) cores (these numbers are not equivalent as they are different architectures, higher is better for each card series) and a lot of GRAM is key to good performance. You may want to ask someone what you need.....hardware wise for certain games to play awesome.</p>
<p>The higher the Screen Resolution used in a game, the slower your game will play. Also, higher resolutions are demanding on your video card and somewhat/kind of on CPU, so you'll want to have nice ones. You may NEED to game in 1080p or 1440p instead of 4k, for speed if not on top end systems.</p>
<p>If Ray Tracing is important to you then go with an NVIDIA GeForce RTX 3070 or later. Ray Tracing can be done in software...as well. The AMD Radeon RX 6800 or later supports Ray Tracing, your mileage may very above 1080p....<p>
<p>IPS gaming monitors are good with fast responsive specifications, wider viewing angles, brilliant color reproduction, and is the most realistic. Be aware a lot of IPS monitors suffer from ghosting on faster games. TN monitors may look duller in color, but are still great for gaming and will give you an edge when playing competitive games for much less money. A VA display is in between the TN and IPS, its contrast ratio is the best; However, since it may have a longer response time in milliseconds this means that with these monitors you are most affected by motion blur.... Some IPS gaming screens have a response speed of 2ms or 1ms, which will try to help with motion blur/ghosting on faster game play . Whichever technology used, make sure you get the highest refresh rate your can afford as that will give better Frames Per Second (FPS).</p>
<p>NVMe M.2 storage drives: if they have a heat sink, make sure it will fix in your case/motherboard...as a card may be put / set above it without enough clearance room....</p>
<p>Random Access Memory (RAM) - The computer's memory: CAS (Column Address Strobe) latency. This is the number of clock cycles that pass from when one instruction is given for an particular column and the moment the data is then available. Basically the lower the CAS latency, the better, within a given memory technology (DDR3, DDR4, or DDR5).</p>
<p>Lower latency means the faster data can be accessed and faster data transfer to the CPU. Expensive RAM has lower latency, also the RAM's clock speed can be overclocked by enthusiasts.</p>
<p>At time this was written: DDR4 is the most common system motherboard RAM and GDDR5 or GDDR6 is common for video cards.</p>
<p>RAM Speed in MHz: DDR4 RAM by default, its maximum stock clock speed for is 2400MHz. Anything over, means the module has been overclocked by the manufacturer. You will want to setup: XMP - eXtreme Memory Profile, by going into BIOS to boost the speed of RAM via XMP/DOCP profile.</p>
<p>For example: High-end AMD Ryzen 7 CPUs may support a 2667MHz bandwidth, but only up to Dual Channel DDR. Of course, your RAM's speed does not change how fast your CPU goes. In fact overclocked RAM may slow the CPU down, it depends more on how much RAM storage space is still Free.</p>
<p>My recommendation for new AMD based systems is aiming for around 3200MHz RAM.</p>
<pre>
<?php if ($_GET['cad'] !== "on") { ?>
You should not need, Error Correction Code (ECC) memory, which is a type of RAM memory found in workstations and servers.
    - It's valued for its ability to preserve critical data by automatically detecting and correcting
    - memory errors, thus it can help fight data corruption. Also, it may be a tiny touch Slower!
    - It is much more expensive, and requires a motherboard that can take handle it.
    ECC RAM can be Registered (also called Buffered) which use a register between the DRAM modules
        - and the system memory controller.....which works differently...
<?php } ?>
</pre>
</article>
<?php
if ($_GET['os'] == "win") {
?>
<br/><br/>You'll <font style="color: #800000">need to buy Microsoft Windows (10 or whatever new <a title='in my personal opinion is "crapware"'>"<u>stuff</u>"</a> they make) to stay legal....
<article id="linux">
<pre>OR
 - use a <b><i>FREE operating system: Linux ( <?= ($_GET['coder'] == "on") ? "<a href=\"https://ubuntu.com/download/desktop\">Ubuntu</a>, " : "" ?><a href="https://linuxmint-installation-guide.readthedocs.io/en/latest/choose.html">Mint</a>, <a href="https://support.system76.com/articles/install-pop/">Pop! OS</a>, or <a href="https://manjaro.org/download/">Manjaro</a>, lots more choices as well... )</i></b></font>
 - then game with <a href="https://store.steampowered.com/linux#p=1&tab=NewReleases">Steam</a>, <a href="https://lutris.net/games">Lutris</a>, or <a HREF="https://www.gog.com/games?page=1&sort=popularity&system=lin_ubuntu,lin_mint,lin_ubuntu_18&language=en">gog.com</a>, etc...

<a href="#" onclick="document.getElementById('linux').style.display = 'none';" class="no-print">Hey, I already know about Linux...click here to skip/remove the article from current view / printed page as well.</a>
 Try Linux out, use a VM (EX: <a href="https://www.virtualbox.org/wiki/Downloads">VirtualBox</a>) on an existing PC or just go ahead and install it on your new PC.
 Pro tip: Use a package manager like apt...to install programs (note: its still possible to use the Software Center to do an Install)
 - this way your not downloading something possibly dangerous....from a web site.
    Example Terminal commands to update package manager and install a program:
        sudo apt-get update
        sudo apt-get install PROGRAM_NAME_HERE
</pre>
Linux Pros:<ol>
    <li>It is very stable, crashes are not common, systems may be up for years at a time......as long as using the stable versions of software.</li>
    <li>Much more secure:
        <ol type="A">
            <li>Since its Open Source Code: Programmers can fix bugs on their own systems without needing the vendors help and anyone may review/patch bugs.</li>
            <li>AppArmor - If enabled, is a kernel security module that allows you to restrict programs capabilities with per-program profiles. Profiles can allow capabilities like network access, raw socket access, and the permission to read, write, or execute files on matching paths.</li>
            <li>FireJail - When Installed, will Keep your browser/email in a jail so it cannot do damage to the rest of the system.</li>
        </ol>
    </li>
    <li>Highly Customizable, You can Tweak anything..open source means you can even add new features if you know how to program in c/c++, or Rust...</li>
    <li>You do updates only when you want to do them, and they often finish quicker.</li>
    <li>Reboots are less commonly needed.</li>
    <li>Once you understand the terminal/system: These skills are in demand $$$!
        <ol type="A">
            <li>Your knowledge should be good for other Linux Distro(s) and will be applicable for decades.</li>
            <li>Can learn Linux Administration and Security.</li>
            <li>Can learn Web Site Development on same systems as production.</li>
            <li>Can learn Dev-OPs....automation.</li>
            <li>Real world: Internet Server Deployments and Configuration.</li>
        </ol>
    </li>
    <li>No cost to install or Update to newer versions or move to another system...</li>
    <li>No stupid, product key codes needed for the OS! No vendor lock in, No hardware based serial numbers used for licensing!</li>
    <li>Typically, the OS does not slow down over time as, No System Registry to get bloated/corrupt. Everything is a file, so you can inspect/look at it if Root</li>
    <li>Better privacy, does not usually call home to spy/collect info on you. Not required to give personal info.</li>
    <li>Less likely to get infected with a Virus! You do not need to run or pay for Anti-Virus! Still be careful, with any email, as download/site links are often how any system gets ransomwared, etc...!!!</li>
    <li>Most things just work without needing device drivers to be installed manually as the kernel installs a ton of devices out of the box.</li>
</ol>
<p>Now days: Linux will have alternatives to popular Windows applications or just as good open source or if not free, cheaper programs to use.</p>
<ul>
    <li>Microsoft Office, replacement: <a href="http://www.libreoffice.org">LibreOffice</a></li>
    <li>Note/Wordpad: <a href="http://www.sublimetext.com">Sublime Text</a> or Geany</li>
    <li>Photoshop (Graphics Editor): Glimpse AKA <a href="https://www.gimp.org/">GIMP </a></li>
    <li>Movie Maker (Video Editor): <a href="http://www.openshot.org">OpenShot</a>, <a href="http://www.kdenlive.org">Kdenlive</a>, <a href="http://www.shotcut.org">Shotcut</a></li>
    <li>Windows Media Player (Video Viewer): <a href="http://www.videolan.org/vlc">VLC</a>, <a href="http://www.mplayerhq.hu/">Mplayer</a></li>
    <li>Adobe Reader (PDF Reader): <a href="http://get.adobe.com/reader">Adobe Reader (For Linux)</a>, <a href="https://wiki.gnome.org/Apps/Evince">Evince</a>, <a href="http://okular.kde.org">Okular</a></li>
    <li>Windows Photo Viewer (Photo Manager): <a href="https://www.digikam.org">digiKam</a>, <a href="https://wiki.gnome.org/Apps/Shotwell">Shotwell</a></li>
    <li>Yahoo Messenger / AOL Instant Messenger (Chat Clients): <a href="https://www.pidgin.im">Pidgin</a>, <a href="http://www.skype.com">Skype</a>, <a href="https://wiki.gnome.org/action/show/Apps/Empathy">Empathy</a>, <a href="http://kopete.kde.org">Kopete</a>, <a href="http://gajim.org">Gajim</a></li>
    <li>Nero Burning Rom (CD/DVD Burner): <a href="http://www.nero.com/enu/promo-linux.html">Nero (For Linux)</a>, <a href="https://wiki.gnome.org/Apps/Brasero">Brasero</a>, <a href="http://www.k3b.org">K3b</a>, <a href="http://goodies.xfce.org/projects/applications/xfburn">Xfburn</a>, <a href="http://sourceforge.net/projects/gnomebaker">GnomeBaker</a>, <a href="http://www.xcdroast.org">X-CD-Roast</a></li>
    <li>Internet Explorer: <a href="https://www.mozilla.org/en-US/firefox/linux/">Fire Fox</a>, <a href="https://www.google.com/chrome/">Google Chrome</a></li>
    <li>CAD: <a href="https://librecad.org/">LibreCAD</a> 2D Drawing/Drafting, <a href="https://www.freecadweb.org/downloads.php">FreeCAD</a> Annotations,  For Architects, For Manufacturers, Simulation</li>
    <li><a href="https://www.playonlinux.com/en/supported_apps-1-0.html">List of Windows Games that may work with Linux using PlayOnLinux</a></li>
</ul>
Linux Cons: (Keep in mind the community makes great efforts to address all of these issues and it constantly improves)<ol>
    <li>Unable to play DVD store bought games for Microsoft Windows. Must Download with Steam or Lutris, or run a Native Linux / Vulcan game.</li>
    <li>In the past, games were harder to install and play. Beware, <i>some Online-games still have issues due to Anti-Cheat bugs.</i></li>
    <li>Some professional applications will not work...Adobe/Autodesk/Microsoft Office...
        <ul>
            <li>Install Microsoft Office using <a href="https://www.playonlinux.com/en/download.html">PlayOnLinux</a>.</li>
            <li>Use Microsoft Office in a Windows virtual machine. <a href="https://www.qemu.org/download/">QEMU</a> or <a href="https://www.virtualbox.org/wiki/Linux_Downloads">VirtualBox for Linux</a></li>
            <li>Use Office Online in a browser.</li>
        </ul>
    </li>
    <li>Fonts may not be as crisp/pop by default out of the box. <a href="../fixfonts.html">How to Fix Linux Fonts</a></li>
    <li>Wonky support for device drivers (this was true at least in the past):
        <ul>
            <li>WiFi works spotty, if at all (this has mostly been patched/fixed in recent kernels).</li>
            <li>Newer devices must be compatible with Linux and your kernel version (make sure equipment box says it can support Linux and check <a title="Original Equipment Manufacturer"><u>OEM</u></a> website)!</li>
            <li>Certain printers, can be painful to get installed (However, a majority of printers are detected and install just fine and easily).</li>
        </ul>
    </li>
</ol>
<a href="printers.html" class="no-print">Printer Support Search for Linux</a><br/>
</article>
<?php } else if ($_GET['os'] == "linux") { ?>
<pre>
for AMD graphics:
$  sudo apt install mesa-vulkan-drivers mesa-vulkan-drivers:i386

for Nvidia graphics:
$  sudo apt install libvulkan1 libvulkan1:i386

Game with <a href="https://store.steampowered.com/linux#p=1&tab=NewReleases">Steam</a>, <a href="https://lutris.net/games">Lutris</a>, or <a HREF="https://www.gog.com/games?page=1&sort=popularity&system=lin_ubuntu,lin_mint,lin_ubuntu_18&language=en">gog.com</a>.
$  sudo apt install steam-installer
$  sudo add-apt-repository ppa:lutris-team/lutris
$  sudo apt install lutris

<a href="../firejail.html">FireJail</a> - When Installed, will Keep your browser/email in a jail so it cannot do damage to the rest of the system.

On a security note: Avoid downloading things... Try to use the terminal package manager instead, to install a popular
 - application or program (but not MOST <a href="https://packages.ubuntu.com/xenial/games-arcade">games</a>):
$ sudo apt-get update
$ sudo apt-get install theProgramNameHere

I did find a board game that says it's like Monopoly called : gtkatlantic it maybe installed via apt.

Some times, the Software Center, will have what your looking for....application wise (or a few okay free games).
Fun for all ages: kapman (like PacMan), SuperTuxKart, Mari0 like but not official Mario Brothers. Also, Xonotic an Arena Shooter.

A very simple puzzle game with gems:
sudo add-apt-repository ppa:dnax88/gweled
sudo apt-get update
sudo apt-get install gweled

Advanced users, can try <a href="https://www.playonlinux.com/en/download.html">Play On Linux</a> to attempt to get a Windows game to run...may work, may not....
</pre>
<?php } else if ($_GET['os'] == "other") {
    echo "<p>Currently, macOS can not legally run on non Apple hardware. This is because Apple sells hardware, and they offer macOS as a feature of that hardware.</p>";
}
?>

    </body>
</html>
