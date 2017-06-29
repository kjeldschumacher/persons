Model Person
============
Represents a person. 

### Properties

| name                | label             | type          | db type     | description                    | 
| ------------------- | ----------------- | ------------- |  ---------- | ------------------------------ |
| uid                 | uid               | integer       | int(11)     | autoincrement, unique id       |  
| status              | Status            | Category      | int(11)     | single system category         |
| position            | Position          | string        | varchar:255 |                                |
| firstName           | First Name        | string        | varchar:255 |                                |
| lastName            | Last Name         | string        | varchar:255 |                                |
| title               | Title             | string        | varchar:255 | Job title or academic title    | 
| image               | Image             | File          | int(11)     | single file reference          |
| gender              | Gender            | integer       | tinyint(4)  | one of predefined constants    |
|                     |                   |               |             | Person::GENDER_UNKNOWN = 0     |
|                     |                   |               |             | Person::GENDER_MALE = 1 (Mr)   |
|                     |                   |               |             | Person::GENDER_FEMALE = 2 (Ms) |
| birthday            | Birthday          | DateTime      | date        |                                |
| phone               | Phone             | string        | varchar:255 |                                |
| fax                 | Fax               | string        | varchar:255 |                                |
| address             | Address           | string        | text        | Street, house number etc.      |
|                     |                   |               |             | Rich Text Editor               |
| zip                 | Zip               | string        | varchar:255 |                                |
| city                | City              | string        | varchar:255 |                                |
| short_biography     | Short Biography   | string        | text        | Rich Text Editor               |
| biography           | Biography         | string        | text        | Rich Text Editor               |
| additionalPictures  | Additional Images | ObjectStorage | int(11)     | Multiple file references       |
| contentElements     | Content Elements  | ObjectStorage | int(11)     | Multiple content elements      |
| departments         | Departments       | ObjectStorage | int(11)     | Multiple sys categories        |

**Legend**
* *Category*  `\TYPO3\CMS\Extbase\Domain\Model\Category`
* *FileReference* `\TYPO3\CMS\Extbase\Domain\Model\FileReference`
* *Person* `\CPSIT\Persons\Domain\Model\Person`
* *ObjectStorage* `\TYPO3\CMS\Extbase\Persistence\ObjectStorage`
* *Content* `\CPSIT\Persons\Domain\Model\Content`

**Note**: The property *status* is implemented as reference to a single system category. 
Available options can be narrowed down by setting a `statusRootCategoryId` in Extension Manager. 
Thus only (direct) children of this category can be selected in the backend form for persons.

The property *departments* is implemented as reference to multiple system categories. 
Available options can be narrowed down by setting a `departmentsRootCategoryId` in Extension Manager. 
Thus only (direct) children of this category can be selected in the backend form for persons.
