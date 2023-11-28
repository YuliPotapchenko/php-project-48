<?phpnamespace Differ\Differ;function getTree(array $arrOfFileDecode1, array $arrOfFileDecode2){    $keys = array_unique(array_merge(array_keys($arrOfFileDecode1), array_keys($arrOfFileDecode2)));    sort($keys);    $map = array_map(function ($key) use ($arrOfFileDecode1, $arrOfFileDecode2) {        if(is_bool($arrOfFileDecode1[$key])) {            $arrOfFileDecode1[$key] = ($arrOfFileDecode1[$key]) ? 'true' : 'false';        }        if(is_bool($arrOfFileDecode2[$key])) {            $arrOfFileDecode2[$key] = ($arrOfFileDecode2[$key]) ? 'true' : 'false';        }        if (!array_key_exists($key, $arrOfFileDecode1)) {            return ['key' => $key, 'value' => $arrOfFileDecode2[$key], 'type' => '+'];        }        if (!array_key_exists($key, $arrOfFileDecode2)) {            return ['key' => $key, 'value' => $arrOfFileDecode1[$key], 'type' => '-'];        }        if ($arrOfFileDecode1[$key] == $arrOfFileDecode2[$key]) {            return ['key' => $key, 'value'=> $arrOfFileDecode1[$key], 'type' => 'unchanged'];        }        return ['key' => $key, 'oldValue' => $arrOfFileDecode1[$key],            'newValue' => $arrOfFileDecode2[$key], 'type' => '-+'];    }, $keys);    return $map;}function gendiff(string $pathToFile1, string $pathToFile2): string{    $diff = '';    $arrOfFileDecode1 = json_decode(file_get_contents($pathToFile1),true);    $arrOfFileDecode2 = json_decode(file_get_contents($pathToFile2),true);    $tree = getTree($arrOfFileDecode1, $arrOfFileDecode2);    $list = array_map(function($data) {        switch ($data['type']) {            case '+':                return "\n  + {$data['key']} : {$data['value']}";                break;            case '-':                return "\n  - {$data['key']} : {$data['value']}";                break;            case 'unchanged':                return "\n    {$data['key']} : {$data['value']}";                break;            case '-+':                return "\n  - {$data['key']} : {$data['oldValue']}\n  + {$data['key']} : {$data['newValue']}";        }    }, $tree);    $diff = implode("", $list);    return "{{$diff}\n}";}