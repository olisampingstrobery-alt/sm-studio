<?php
// Generate favicon files for SM Studio from the logo design
// Dark navy circle + metallic SM + STUDIO text + blue dot
// Requires GD with FreeType

$publicDir = __DIR__ . '/public';
$fontBold = 'C:\Windows\Fonts\arialbd.ttf';
$fontRegular = 'C:\Windows\Fonts\arial.ttf';

// Helper: hex to rgb
function hex2rgb($hex) {
    $hex = ltrim($hex, '#');
    if(strlen($hex)==3) $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
    return [hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2))];
}

function createSmStudioImage($size) {
    global $fontBold, $fontRegular;
    $img = imagecreatetruecolor($size, $size);
    imagesavealpha($img, true);
    imagealphablending($img, false);
    $transparent = imagecolorallocatealpha($img, 0, 0, 0, 127);
    imagefill($img, 0, 0, $transparent);
    imagealphablending($img, true);

    // Background circle - dark navy gradient approximation
    // Base color #0B1D33, highlight #123255
    $center = $size / 2;
    $radius = $size * 0.48;

    // Draw circle with smooth edge
    // Fill with solid dark color
    $bg = imagecolorallocate($img, 11, 29, 51); // #0B1D33
    $bgLight = imagecolorallocate($img, 18, 45, 78); // highlight

    // Draw filled circle
    imagefilledellipse($img, $center, $center, $radius*2, $radius*2, $bg);

    // Add subtle highlight gradient (ellipse at top)
    $highlightAlpha = imagecolorallocatealpha($img, 30, 65, 110, 90);
    imagefilledellipse($img, $center, $center - $radius*0.35, $radius*1.4, $radius*0.8, $highlightAlpha);
    $highlight2 = imagecolorallocatealpha($img, 60, 100, 160, 110);
    imagefilledellipse($img, $center, $center - $radius*0.5, $radius*0.6, $radius*0.3, $highlight2);

    // Draw SM text - metallic effect approximation
    // Use white/silver with shadow

    // For larger sizes, we draw SM with custom polygon ribbon effect
    // For favicon small sizes, simple text is more readable

    if ($size >= 180) {
        // Detailed version for apple-touch-icon / 512
        // Draw SM ribbon as stylized text
        // Shadow
        $shadow = imagecolorallocatealpha($img, 0, 0, 0, 60);
        // We'll use TTF for SM
        $smSize = $size * 0.38; // font size
        $smText = "SM";
        // Calculate bbox
        $bbox = imagettfbbox($smSize, 0, $fontBold, $smText);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        $x = $center - $textWidth/2;
        // Adjust Y - center vertically a bit up
        $y = $center - $size*0.05 + $textHeight/2;

        // Metallic gradient: draw multiple layers with different colors to simulate chrome
        // Layer1: dark shadow
        imagettftext($img, $smSize, 0, (int)($x+3), (int)($y+3), $shadow, $fontBold, $smText);
        // Layer2: silver gradient approximation - draw with light gray then white highlight
        $silver1 = imagecolorallocate($img, 180, 190, 200);
        $silver2 = imagecolorallocate($img, 220, 230, 240);
        $silver3 = imagecolorallocate($img, 255, 255, 255);
        $midBlue = imagecolorallocate($img, 120, 160, 190);

        // Draw base silver
        imagettftext($img, $smSize, 0, (int)$x, (int)$y, $silver1, $fontBold, $smText);
        // Highlight offset
        imagettftext($img, $smSize*0.98, 0, (int)($x+1), (int)($y-2), $silver2, $fontBold, $smText);
        // Top highlight
        imagettftext($img, $smSize*0.96, 0, (int)($x+1), (int)($y-4), $silver3, $fontBold, $smText);

        // Blue dot at bottom right of M (like logo)
        $dotX = $x + $textWidth - $size*0.06;
        $dotY = $y + $size*0.02;
        $dotR = $size * 0.035;
        $blueDotOuter = imagecolorallocate($img, 0, 170, 255);
        $blueDotMid = imagecolorallocate($img, 0, 120, 220);
        $blueDotInner = imagecolorallocate($img, 160, 220, 255);
        imagefilledellipse($img, (int)$dotX, (int)$dotY, (int)($dotR*2), (int)($dotR*2), $blueDotOuter);
        imagefilledellipse($img, (int)$dotX, (int)$dotY, (int)($dotR*1.5), (int)($dotR*1.5), $blueDotMid);
        imagefilledellipse($img, (int)$dotX, (int)$dotY, (int)($dotR*0.8), (int)($dotR*0.8), $blueDotInner);
        // Outer glow
        $glow = imagecolorallocatealpha($img, 0, 150, 255, 70);
        imagefilledellipse($img, (int)$dotX, (int)$dotY, (int)($dotR*3), (int)($dotR*3), $glow);

        // STUDIO text below
        $studioSize = $size * 0.11;
        $studioText = "STUDIO";
        // Letter spacing approximation - imagettftext doesn't support tracking, so draw char by char
        $studioY = $y + $size * 0.14;
        $totalWidth = 0;
        $charWidths = [];
        $charBoxes = [];
        foreach (str_split($studioText) as $ch) {
            $b = imagettfbbox($studioSize, 0, $fontBold, $ch);
            $w = $b[2]-$b[0];
            $charWidths[] = $w;
            $charBoxes[] = $b;
            $totalWidth += $w;
        }
        $spacing = $size * 0.018;
        $totalWidth += $spacing * (strlen($studioText)-1);
        $sx = $center - $totalWidth/2;
        $white = imagecolorallocate($img, 255, 255, 255);
        $xPos = $sx;
        foreach (str_split($studioText) as $i => $ch) {
            imagettftext($img, $studioSize, 0, (int)$xPos, (int)$studioY, $white, $fontBold, $ch);
            $xPos += $charWidths[$i] + $spacing;
        }

    } elseif ($size >= 32) {
        // Medium (32, 48, etc) - simpler SM
        $smSize = $size * 0.42;
        $smText = "SM";
        $bbox = imagettfbbox($smSize, 0, $fontBold, $smText);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        $x = $center - $textWidth/2;
        $y = $center + $textHeight/2 - $size*0.02;

        $shadow = imagecolorallocatealpha($img, 0, 0, 0, 60);
        imagettftext($img, $smSize, 0, (int)($x+2), (int)($y+2), $shadow, $fontBold, $smText);
        $silver = imagecolorallocate($img, 230, 235, 245);
        imagettftext($img, $smSize, 0, (int)$x, (int)$y, $silver, $fontBold, $smText);

        // Blue dot small
        $dotX = $x + $textWidth - $size*0.05;
        $dotY = $y - $size*0.02;
        $dotR = max(2, $size * 0.06);
        $blue = imagecolorallocate($img, 0, 150, 255);
        imagefilledellipse($img, (int)$dotX, (int)$dotY, (int)($dotR*2), (int)($dotR*2), $blue);

        if ($size >= 48) {
            $studioSize = $size * 0.13;
            $studioText = "STUDIO";
            $bbox2 = imagettfbbox($studioSize, 0, $fontBold, $studioText);
            $w2 = $bbox2[2]-$bbox2[0];
            $sx = $center - $w2/2;
            $sy = $y + $size*0.18;
            $white = imagecolorallocate($img, 255, 255, 255);
            imagettftext($img, $studioSize, 0, (int)$sx, (int)$sy, $white, $fontBold, $studioText);
        }

    } else {
        // Very small 16x16 - only SM initials, ultra simplified
        $smSize = $size * 0.55;
        $smText = "M"; // At 16px, "SM" too cramped, use M dominant like logo shape? But keep SM scaled
        // Try SM with smaller font
        $smSize = $size * 0.38;
        $smText = "SM";
        $bbox = imagettfbbox($smSize, 0, $fontBold, $smText);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        $x = $center - $textWidth/2;
        $y = $center + $textHeight/2 - 1;
        $white = imagecolorallocate($img, 240, 245, 255);
        imagettftext($img, $smSize, 0, (int)$x, (int)$y, $white, $fontBold, $smText);
        // Tiny blue dot
        $dotR = 1;
        $blue = imagecolorallocate($img, 0, 160, 255);
        $dotX = (int)($x + $textWidth - 1);
        $dotY = (int)($y - 1);
        imagefilledellipse($img, $dotX, $dotY, 3, 3, $blue);
    }

    return $img;
}

$sizes = [
    512 => 'android-chrome-512x512.png',
    192 => 'android-chrome-192x192.png',
    180 => 'apple-touch-icon.png',
    32 => 'favicon-32x32.png',
    16 => 'favicon-16x16.png',
];

foreach ($sizes as $sz => $filename) {
    $img = createSmStudioImage($sz);
    $path = $publicDir . '/' . $filename;
    imagepng($img, $path, 9);
    imagedestroy($img);
    echo "Created $filename ({$sz}x{$sz}) - ".filesize($path)." bytes\n";
}

// Create favicon.ico as 32x32 ICO with PNG inside (modern browsers) but also proper ICO
// Simplest: create a proper ICO file containing 16 and 32
function createIco($publicDir) {
    $files = [
        16 => $publicDir . '/favicon-16x16.png',
        32 => $publicDir . '/favicon-32x32.png',
    ];
    $images = [];
    foreach ($files as $sz => $path) {
        $images[$sz] = file_get_contents($path);
    }

    // ICO header: 0,0,1,0, numImages (2 bytes LE)
    $ico = pack('vvv', 0, 1, count($images));
    $offset = 6 + count($images)*16; // header + directory entries
    $imageData = '';
    $dir = '';
    foreach ($images as $sz => $data) {
        $width = $sz >=256 ? 0 : $sz;
        $height = $sz >=256 ? 0 : $sz;
        $size = strlen($data);
        // Directory entry: width(1), height(1), colors(1), reserved(1), planes(2), bpp(2), size(4), offset(4)
        $dir .= pack('CCCCvvVV', $width, $height, 0, 0, 1, 32, $size, $offset);
        $offset += $size;
        $imageData .= $data;
    }
    $ico .= $dir . $imageData;
    file_put_contents($publicDir . '/favicon.ico', $ico);
    echo "Created favicon.ico (".filesize($publicDir.'/favicon.ico')." bytes) with 16 & 32 PNG embedded\n";
}

createIco($publicDir);

// Create SVG favicon (scalable, perfect for modern browsers)
$svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <defs>
    <radialGradient id="bg" cx="50%" cy="35%" r="70%">
      <stop offset="0%" stop-color="#16365A"/>
      <stop offset="55%" stop-color="#0B1D33"/>
      <stop offset="100%" stop-color="#081428"/>
    </radialGradient>
    <linearGradient id="metal" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#8EA0B8"/>
      <stop offset="18%" stop-color="#E6ECF5"/>
      <stop offset="35%" stop-color="#AAB8CD"/>
      <stop offset="50%" stop-color="#FFFFFF"/>
      <stop offset="68%" stop-color="#9AAEC8"/>
      <stop offset="85%" stop-color="#EAF0FA"/>
      <stop offset="100%" stop-color="#7D91AF"/>
    </linearGradient>
    <radialGradient id="dotGlow" cx="50%" cy="50%" r="50%">
      <stop offset="0%" stop-color="#7DD3FF" stop-opacity="0.9"/>
      <stop offset="40%" stop-color="#0095FF" stop-opacity="0.7"/>
      <stop offset="100%" stop-color="#0066CC" stop-opacity="0"/>
    </radialGradient>
    <radialGradient id="dotCore" cx="35%" cy="30%" r="70%">
      <stop offset="0%" stop-color="#C8EFFF"/>
      <stop offset="35%" stop-color="#2AB0FF"/>
      <stop offset="70%" stop-color="#0077D9"/>
      <stop offset="100%" stop-color="#003A7A"/>
    </radialGradient>
  </defs>
  <!-- Background circle -->
  <circle cx="50" cy="50" r="48" fill="url(#bg)" stroke="#0B1D33" stroke-width="1.5"/>
  <!-- Subtle highlight -->
  <ellipse cx="50" cy="28" rx="28" ry="12" fill="white" opacity="0.06"/>
  <!-- SM Ribbon shape - approximated with path -->
  <path d="M 18 58 C 18 52 20.5 48.5 25.5 46.5 L 42 38.5 C 44.5 37.3 46.8 37.3 49 38.5 L 58 43.5 L 67 39 C 69.2 37.9 71.5 37.9 73.8 39 L 82 43.2 C 84.5 44.5 86 46.8 86 50.2 L 86 70 L 78 70 L 78 51.5 L 70 47.2 L 61 51.7 C 58.8 52.8 56.5 52.8 54.3 51.7 L 45.5 46.8 L 29 55.2 C 27.5 56 26.2 57 25 58.2 C 24 59.5 24 60.8 25 62.2 C 26 63.6 27.8 64.6 30.3 65.2 L 58 73.5 C 61 74.3 63 76 64 78.5 C 65 81 64.5 83.2 62.5 85.2 C 60.5 87.2 58 88.2 55 88.2 L 18 88.2 L 18 80.2 L 54.5 80.2 C 55.8 80.2 56.8 79.9 57.5 79.2 C 58.2 78.5 58.3 77.7 57.8 76.8 C 57.3 75.9 56.2 75.2 54.5 74.7 L 26.5 66.2 C 22.5 65 19.8 63.2 18.5 60.8 Z" fill="url(#metal)" stroke="#5A7090" stroke-width="0.4" stroke-linejoin="round"/>
  <!-- STUDIO text -->
  <text x="50" y="96" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-weight="700" font-size="11.5" letter-spacing="2.2" fill="white">STUDIO</text>
  <!-- Blue dot -->
  <circle cx="82" cy="73.5" r="6.5" fill="url(#dotGlow)"/>
  <circle cx="82" cy="73.5" r="4.2" fill="url(#dotCore)" stroke="#00B0FF" stroke-width="0.6" opacity="0.95"/>
  <circle cx="82" cy="73.5" r="1.8" fill="none" stroke="white" stroke-width="0.5" opacity="0.85"/>
  <circle cx="82" cy="73.5" r="0.9" fill="white" opacity="0.9"/>
</svg>
SVG;

file_put_contents($publicDir . '/favicon.svg', $svg);
echo "Created favicon.svg (".filesize($publicDir.'/favicon.svg')." bytes)\n";

// Create site.webmanifest
$manifest = [
    "name" => "SM Studio — Unit Produksi PPLG SMK BPPI Baleendah",
    "short_name" => "SM Studio",
    "description" => "SM STUDIO — Unit Produksi PPLG dari SMK BPPI Baleendah. Dibangun siswa, siap bantu website & solusi digital Anda.",
    "icons" => [
        ["src" => "/android-chrome-192x192.png", "sizes" => "192x192", "type" => "image/png"],
        ["src" => "/android-chrome-512x512.png", "sizes" => "512x512", "type" => "image/png"]
    ],
    "theme_color" => "#0B1D33",
    "background_color" => "#0B1D33",
    "display" => "standalone"
];
file_put_contents($publicDir . '/site.webmanifest', json_encode($manifest, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
echo "Created site.webmanifest\n";

echo "Done! Favicon set complete.\n";
