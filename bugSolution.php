```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && strpos($value, 'error') !== false) {
      // Handle error strings
      $data[$key] = str_replace('error', 'ERROR', $value);
    }
  }
  return $data;
}

$data = ['a' => 'some error', 'b' => ['c' => 'another error', 'd' => 'value']];
$processedData = processData($data);
print_r($processedData);
```