# Laravel Adobe Connect!

[![Build Status](https://travis-ci.org/soheilrt/laravel-adobe-connect-client.svg?branch=master)](https://travis-ci.org/soheilrt/laravel-adobe-connect-client)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/soheilrt/laravel-adobe-connect-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/soheilrt/laravel-adobe-connect-client/?branch=master)

* [Intro](#intro)
* [Installation](#installation)
* [Minimum Requirements](#minimum-requirements)
* [Quick start](#quick-start)
* [Commands](#commands)
* Queries
    * [Filter](#filtering-results)
    * [Sorting](#sorting-results)
* Advanced
    * [Publishing Configs](#publishing-configs)
    * [Entities](#entities)
    * [Mass assignment](#mass-assigment)
    * [Casting to array](#casing-to-array)
    * [Cache](#cache)
    * [Facades](#facades)
* [Pending](#pending)

## Intro
`Laravel Adobe Connect` provides a convenient way for Laravel applications to communicate with adobe connect API. This package is originally inspired by [brunogasparetto's](https://github.com/brunogasparetto/AdobeConnectClient) package but had some changes to provide more flexibility for developers while using this package!

## Installation
You can install this package through  [packagist](https://packagist.org/packages/soheilrt/laravel-adobe-connect-client) via the following command.
```sh
composer require soheilrt/laravel-adobe-connect-client
```


## Minimum Requirements
-  PHP 7.2
-  PHP-CURL Extention
-  Adobe Connect API  V9.4.5
-  Laravel 5.8

## Quick Start
1. Install the package via composer
```bash 
composer require soheilrt/laravel-adobe-connect-client
```
2. Set your adobe info inside .env file
```bash
ADOBE_CONNECT_HOST #your account host URL address with http:// OR https:// prefix
ADOBE_CONNECT_USER_NAME #your adobe connect account username
ADOBE_CONNECT_PASSWORD #your adobe connect account password
```
And you're all set :-).

You can also run following command to make sure everything work just fine
```php
use Soheilrt\AdobeConnectClient\Facades\Client;
$commonInfo =Client::commonInfo();
```


## Commands
All of the commands inside this package runs via the `Client` class. 

All available commands are listed below:

| Command                     | parameters                                                                                  | Returns       | Descriptions                                                                                                                                                                                                                       |
|:----------------------------|:--------------------------------------------------------------------------------------------|:--------------|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| AclFieldUpdate              | `int` $aclId <br> `string` $fieldId <br> `mixed` $value <br> `Arrayable`$extraParams=`null` | `bool`        | Updates the passed in field-id for the specified acl-id.[see][1]                                                                                                                                                                   |
| CommonInfo                  | `string` $domain = ' '                                                                      | `CommonInfo`  | Fetch basic information about the current user and the Adobe Connect account, including the value of the BREEZESESSION cookie. [see][2]                                                                                            |
| GroupMembershipUpdate       | `int` $groupId <br> `int` $principalId <br> `bool` $isMember                                | `bool`        | Add or remove one or more principals to or from a group. [see][3]                                                                                                                                                                  |
| ListRecordings              | `int` $folderId                                                                             | `SCORecord[]` | Provides a list of recordings (FLV and MP4) from a specified folder. [see][4]                                                                                                                                                      |
| Login                       | `string` $login <br> `string` $password                                                     | `bool`        | Login in the Service.                                                                                                                                                                                                              |
| Logout                      | -                                                                                           | `bool`        | Logout the service.                                                                                                                                                                                                                |
| MeetingFeatureUpdate        | `int` $accountId <br> `string` $featureId <br> `bool` $enable                               | `bool`        | Enable or disable features in a meeting, say to configure compliance settings. For example, tweak features of the various pods, disable recordings of meetings, and so on. [see][5]                                                |
| PermissionInfoFromPrincipal | `int` $aclId <br> `int` $principalId                                                        | `Permission`  | Get the Principal's permission in a SCO, Principal or Account. [see][6]                                                                                                                                                            |
| PermissionUpdate            | `Arrayable` $permission                                                                     | `bool`        | How to programmatically provide users access to or remove access from various Adobe Connect sessions. [see][7]                                                                                                                     |
| PermissionsInfo             | `int` $aclId <br> `Arrayable` $filter=`null` <br> `Arrayable` $sorter=`null`                | `Principal[]` | Find information about what permissions a principal has on a SCO, an account, or on a principal. Also, fetches the group and child information of the principal. [see][8]                                                          |
| PrincipalCreate             | `Arrayable` $principal                                                                      | `Principal`   | Create a Principal. [see][9]                                                                                                                                                                                                       |
| PrincipalDelete             | `int` $principalId                                                                          | `bool`        | Using Administrator permissions, delete one or more users or groups (principals). [see][10]                                                                                                                                        |
| PrincipalInfo               | `int` $principalId                                                                          | `Principal`   | Provides information about one principal, either a user or a group. [see][11]                                                                                                                                                      |
| PrincipalList               | `int` $groupId=`0`  <br> `Arrayable` $filter=`null`  <br> `Arrayable` $sorter=`null`        | `Principal[]` | Provides a complete list of users and groups, including primary groups. [see][12]                                                                                                                                                  |
| PrincipalUpdate             | `Arrayable` $principal                                                                      | `bool`        | update an existing principal (a user or group), using the same account as the user making the API call. [see][9]                                                                                                                   |
| RecordingPasscode           | `int` $scoId <br>  `string` $passcode                                                       | `bool`        | Set the passcode on a Recording and turned into public.                                                                                                                                                                            |
| ScoContents                 | `int` $scoId <br>  `Arrayable` $filter=`null`  <br>  `Arrayable` $sorter=`null`             | `SCO[]`       | Returns a list of SCOs within another SCO. The enclosing SCO can be a folder, meeting, or curriculum. [see][13]                                                                                                                    |
| ScoCreate                   | `Arrayable` $sco                                                                            | `SCO`         | Create a SCO. [see][14]                                                                                                                                                                                                            |
| ScoDelete                   | `int` $scoId                                                                                | `bool`        | Deletes a SCO. [see][15]                                                                                                                                                                                                           |
| ScoInfo                     | `int` $scoId                                                                                | `SCO`         | Fetch detailed information about any content, meeting, or sessions (SCO) in Adobe Connect. [see][16]                                                                                                                               |
| ScoMove                     | `int` $scoId <br>  `int` $folderId                                                          | `bool`        | Moves a SCO from one folder to another. [see][17]                                                                                                                                                                                  |
| ScoShortcuts                | `Arrayable` $filter=`null`  <br>  `Arrayable` $sorter=`null`                                | `SCO[]`       | Provides information about the folders relevant to the current user. These include a folder for the user’s current meetings, a folder for the user’s content, as well as folders above them in the navigation hierarchy. [see][18] |
| ScoUpdate                   | `Arrayable` $sco                                                                            | `bool`        | Update a SCO. NOTE: This action requires sco-id. if there is no sco-id provided when calling this action, it'll throw an `InvalidException`. [see][14]                                                                             |
| ScoUpload                   | `int` $folderId <br>  `string` $resourceName <br>  `resource|SplFileInfo` $file             | `int|null`    | Uploads a file to the server and then builds the file, if necessary. [see][19]                                                                                                                                                     |
| UserUpdatePassword          | `int` $userId <br>  `string` $newPassword <br>  `string` $oldPassword=`''`                  | `bool`        | Changes a user’s password. [see][20]                                                                                                                                                                                               |

[1]: https://helpx.adobe.com/adobe-connect/webservices/acl-field-update.html 
[2]: https://helpx.adobe.com/adobe-connect/webservices/common-info.html
[3]: https://helpx.adobe.com/adobe-connect/webservices/group-membership-update.html
[4]: https://helpx.adobe.com/adobe-connect/webservices/list-recordings.html
[5]: https://helpx.adobe.com/adobe-connect/webservices/meeting-feature-update.html
[6]: https://helpx.adobe.com/adobe-connect/webservices/permissions-info.html
[7]: https://helpx.adobe.com/adobe-connect/webservices/permissions-update.html#permissions_update
[8]: https://helpx.adobe.com/adobe-connect/webservices/permissions-info.html
[9]: https://helpx.adobe.com/adobe-connect/webservices/principal-update.html
[10]: https://helpx.adobe.com/adobe-connect/webservices/principals-delete.html
[11]: https://helpx.adobe.com/adobe-connect/webservices/principal-info.html
[12]: https://helpx.adobe.com/adobe-connect/webservices/principal-list.html
[13]: https://helpx.adobe.com/adobe-connect/webservices/sco-contents.html
[14]: https://helpx.adobe.com/adobe-connect/webservices/sco-update.html
[15]: https://helpx.adobe.com/adobe-connect/webservices/sco-delete.html
[16]: https://helpx.adobe.com/adobe-connect/webservices/sco-info.html
[17]: https://helpx.adobe.com/adobe-connect/webservices/sco-move.html
[18]: https://helpx.adobe.com/adobe-connect/webservices/sco-shortcuts.html
[19]: https://helpx.adobe.com/adobe-connect/webservices/sco-upload.html
[20]: https://helpx.adobe.com/adobe-connect/webservices/user-update-pwd.html


## Queries 
There might be times that you want to filter(Sort) your data or results,
you can do that via `Filter` and `Sort` Classes

### Filtering Results
 
Here is an Example of how you can use `Filter` Class for commands that accepts Filtering
```php   
    /**
     * @param  \Soheilrt\AdobeConnectClient\Client\Client  $client
     *
     * @throws \Exception
     * @return array
     */
    public function exampleScoContents(\Soheilrt\AdobeConnectClient\Client\Client $client): array 
    {
        $folderId = 12345;

        $filter = Soheilrt\AdobeConnectClient\Client\Filter::instance()
            ->like('name', 'Test')
            ->dateAfter('dateBegin', new \DateTimeImmutable());

        return $client->scoContents($folderId, $filter);
    }
```

### Sorting Results
Here is an example of how you can sort your query result on queries that accept Sorting
```php
use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Client\Filter;
use Soheilrt\AdobeConnectClient\Client\Sorter;

class ExampleClass
{
    /**
     * @param  Client  $client
     *
     * @throws \Exception
     * @return array 
     */
    public function exampleMethod(Client $client): array 
    {
        $folderId = 12345;

        $filter = Filter::instance()
            ->like('name', 'Test')
            ->dateAfter('dateBegin', new DateTimeImmutable());

        $sorter = Sorter::instance()
            ->asc('dateBegin');

        return $client->scoContents($folderId, $filter, $sorter);
    }
}
```



## Advanced

### Entities
You may sometimes want to change data on the fly!
In this case you can do that with Accessor and mutators. You only need to extend base
entity class (e.g: SCO Entity) and add your Accessor or Mutator to extended class
and set your entity as primary entity inside package config file.


Here you can see an example of accessor which change description to uppercase
on the fly!
```php
#An Example of accessor 
Class ExtendedSco extends \Soheilrt\AdobeConnectClient\Facades\SCO
{
    public function getDescription()
    {
        return strtoupper($this->attributes['description']);
    }
}
```

and here is an example for mutator which manipulate data on the fly
while trying to set properties inside entities.
```php
class ExtendedSco extends \Soheilrt\AdobeConnectClient\Facades\SCO
{
    public function setDescription($value)
    {
        $this->attributes['description']=strtolower($value);
    }
}
```

> **Note:** Entities Accessors Does Not support any arguments and Mutator
are only support one arguments which accepts the data that user wants to set to the entity!

### Publishing Configs
You may also want to publish config files to customize this package based on your needs. 
```bash
php artisan vendor:publish --tag=adobe-connect
```

### Mass assigment
Sometimes you want to assign mass of information to your entity.
Here we made that possible with `fill` method just list eloquent models!
```php
use \Soheilrt\AdobeConnectClient\Client\Entities\SCO;
$data=[
    'sco-id'=>1,
    'name'=>'new name'
];
$sco=SCO::instance()->fill($data);
```

### Casting to array
If you ever want access to entities data at once, you can call `toArray()` command to access the
whole entity data at the once.


### Session Cache
By Default, we cache user session to prevent extra loggin request on every command but you
can disable this feature if you prefer to manage your sessions manually

> **Note:** we do not perform automatical login request if you disbale session cache
and you should perform it manually.

### Facades
we provided facades for entities in case you may someday change
default entities to your custom entities and if you've used facades to accessing/instatiating
instaces, you don't need to change anything inside your code because it'll handeled by adobe connect service provider
and inject provided entity from config file.

## Pending
 - [ ] Add Queue Support for Client Commands
