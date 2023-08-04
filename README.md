# Lightweight Data Json (LD-JSON) Format

## Purpose

The Lightweight Data Json (LD-JSON) format was developed with the aim of providing a lighter alternative to the conventional JSON format. It seeks to address the issue of key repetition in each object, making the data structure more compact and storage-efficient. By eliminating the need to repeat keys in each object, LD-JSON is especially suitable for scenarios where space-saving is crucial.

## Usage

The LD-JSON format can be used similarly to CSV or TSV files, with the added advantage of including a header that indicates the type of each value present in the objects. This facilitates data interpretation and helps ensure data integrity.

The basic syntax of LD-JSON involves a header that defines data types, followed by data objects, each representing a set of related values. Data types are indicated in the header after the ":" symbol.



## Examples

Here are examples of data before and after being encoded in the LD-JSON format:

### Original Data

```php
$data = [
  [
    "name" => "Asana", 
    "type" => "productivity", 
    "url" => "https://developers.asana.com/docs", 
    "price" => 0,
    "authentication" => "oauth"
  ],
  [
    "name" => "ClickUp", 
    "type" => "productivity", 
    "url" => "https://clickup.com/api/", 
    "price" => 0, 
    "authentication" => "oauth"
  ],
  [
    "name" => "Atlassian", 
    "type" => "productivity", 
    "url" => "https://developer.atlassian.com/server/jira/platform/rest-apis/", 
    "price" => 0, 
    "authentication" => "oauth;basic"
  ],
  ...
];
```
### Data Encoded in LD-JSON

```ld-json
{	name:string	type:string	url:string	price:integer	authentication:string	}
{	Asana	productivity	https://developers.asana.com/docs	0	oauth	}
{	ClickUp	productivity	https://clickup.com/api/	0	oauth	}
{	Atlassian	productivity	https://developer.atlassian.com/server/jira/platform/rest-apis/	0	oauth;basic	}
...
```

We hope that LD-JSON proves to be useful for your data storage and transfer needs in an efficient manner. Feel free to contribute, modify, and use as per your specific requirements.

## License

This format follows the terms of the MIT License. The MIT License is permissive and allows for use, modification, and redistribution of the software, subject to certain conditions. It's important to note that the license includes a disclaimer, stating that the software is provided "as is," without warranties of any kind. Furthermore, the license limits the liability of the author or copyright holder for any damages arising from the use of the software.

This project is licensed under the MIT License - see the LICENSE file for details.

Please feel free to customize and adjust the content as needed to meet your specifications. Also, make sure to add the corresponding `LICENSE` file to your repository.
