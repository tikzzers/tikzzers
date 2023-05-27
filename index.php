<?php

function file2Array( $fileName ){ 
    $out = array(); 
    $rows = file( $fileName ); 
    foreach( $rows as $rowNr => $row ) 
        $out[$rowNr] = explode( "|", $row ); 
    return $out; 
} 

function array2File( $array, $fileName ){ 
    $fileString = ""; 
    foreach( $array as $row ) 
        $fileString .= implode( "|", $row ); 
    $fp = fopen( $fileName, "w" ); 
    fwrite( $fp, $fileString );  
    fclose( $fp ); 
} 

function lines( $file ){ 
    // в начале ищем сам файл. Может быть, путь к нему был некорректно указан 
    if(!file_exists($file))exit("Файл не найден"); 
     
    // рассмотрим файл как массив
    $file_arr = file($file); 
     
    // подсчитываем количество строк в массиве 
    $lines = count($file_arr); 
     
    // вывод результата работы функции 
    return $lines; 
} 


$descriptor = fopen('redic.txt', 'r');

if ($descriptor) {
    while (($string = fgets($descriptor)) !== false) {
		$mass=explode("|",$string);
		if ($mass[2]=="none"){$str=$mass[0];break;}
    }
    fclose($descriptor);

}

if (!is_numeric($str)){
	if ($descriptor) {
		$i=0;
		$fileName = "redic.txt"; 
		$len = lines($fileName);
		$fileArray = file2Array( $fileName ); 
    while ($i<$len) {
		$fileArray[$i++][2] = "none"; 
		array2File( $fileArray, $fileName ); 
	}
		$str=0;
	}
	$str=0;
}

		$fileName = "redic.txt"; 
		$fileArray = file2Array( $fileName ); 
		$fileArray[$str][2] = "Approved"; 
		array2File( $fileArray, $fileName ); 


echo $fileArray[$str][1];

 
?>

<script>
    window.location.replace("<? echo $fileArray[$str][1]; ?>");
</script>