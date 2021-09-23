# CSV CONVERT

Convertendo arquivos csv para array

## Como usar:

```php

require 'src/Convert.php';

$results = Convert\CSV::toArray('/path-to-file/file.csv', ',');

//Results
array(2) { [0]=> string(14) "22637212000111" [1]=> string(6) "171665" }
array(2) { [0]=> string(14) "52079369000112" [1]=> string(6) "172837" }
array(2) { [0]=> string(14) "51055810000101" [1]=> string(6) "173288" }
array(2) { [0]=> string(14) "12404336000148" [1]=> string(6) "138230" }
array(2) { [0]=> string(14) "21675698000188" [1]=> string(6) "169931" }
array(2) { [0]=> string(14) "99349416000441" [1]=> string(6) "172536" }

```

## Parâmetros:

| Parâmetro | Tipo     | Descrição                |
| :-------- | :------- | :------------------------- |
| `file`    | `string` | **Obrigatório**. Arquivo CSV |
| `separator` | `string` | Separador de coluna do CSV, Padrão *;* |


## Arquivo CSV Exemplo
```csv
22637212000111,171665
52079369000112,172837
51055810000101,173288
12404336000148,138230
21675698000188,169931
99349416000441,172536

```
