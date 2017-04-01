
<?php
echo odaialali\qrcodereader\QrReader::widget([
	'id' => 'qrInput',
	'successCallback' => "function(data){ $('#qrInput').val(data) }"
]);

?>