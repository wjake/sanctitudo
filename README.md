# Sanctitudo Sollertia Website 

## Deployment
#
#### Additionally required enviroment data

- FREE_COMPANY_ID `integer` id of free company from Lodestone
- RAID_HELPER_ID `integer` id of raid helper server 
- RAID_HELPER_KEY `string` key of raid helper server api

#### Setup commands
```sh
composor install
php artisan key:generate
```
> Note: `php artisan serve` can be used to run a local development server 

## Data & models

FreeCompany
- uid `integer`
- name `string`
- activeMemberCount `integer`
- estateGreeting `string`
- estateName `string`
- estatePlot `string`
- formed `integer`
- recruitment `boolean`
- slogan `string`
- tag `string`

FreeCompanyMember
- free_company_id `integer`
- uid `integer`
- name `string`
- rank `string`
- rankIcon `string`
- avatar `string`

Event
- event_uid `integer`
- channelId `integer`
- channelName `string`
- channelType `string`
- leaderId `integer`
- leaderName `string`
- title `string`
- description `string`
- imageUrl `string`
- startTime `integer`
- endTime `integer`
- closeTime `integer`

Signups
- event_id `integer`
- name `string`
- userId `integer`
- className `string`
- specName `string`
- entryTime `integer`

### Data caching

Due to API request limitations and latency, data is pulled manually and cached locally via the following commands:

```sh
php artisan freecompany:update
php artisan raidhelper:fetch
```

> Note: `php artisan schedule:run` will run both commands as part of the framework scheduler