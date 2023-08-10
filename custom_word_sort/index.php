<?php
function customWordSort($arr) {
    $haveSingle = [];
    $haveBoth = [];
    $singleLetters = [];

    foreach ($arr as $val) {
        if (strlen($val) > 1) {
            $haveVowel = false;
            $haveConsonant = false;
            
            foreach (str_split($val) as $letter) {
                if (in_array($letter, ['a', 'e', 'i', 'o', 'u'])) {
                    $haveVowel = true;
                } elseif (ctype_alpha($letter)) {
                    $haveConsonant = true;
                }
            }
            
            if ($haveVowel && $haveConsonant) {
                $haveBoth[] = $val;
            } else {
                $haveSingle[] = $val;
            }
        } else {
            $singleLetters[] = $val;
        }
    }
    
    sort($haveBoth);
    rsort($haveSingle);
    sort($singleLetters);
    
    return array_merge($haveBoth, $haveSingle, $singleLetters);
}

$words = [
    "dog", "apple", "banana", "cat", "elephant", "igloo", "ocean",
    "a", "e", "i", "p", "u", "sdf", "mnh", "qwrt",
    "zoo", "tree", "ant", "goat", "mncb", "hbl",
    "aei", "ou", "aeio", "bcdfghjklmnpqrstvwxyz"
];

$sortedWords = customWordSort($words);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Word Sorting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .word-list {
            width: 45%;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .word-list h2 {
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
            padding: 5px;
            background-color: #f2f2f2;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="word-list">
            <h2>Unsorted Words</h2>
            <ul>
                <?php foreach ($words as $word) : ?>
                    <li><?php echo $word; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="word-list">
            <h2>Sorted Words</h2>
            <ul>
                <?php foreach ($sortedWords as $word) : ?>
                    <li><?php echo $word; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>


