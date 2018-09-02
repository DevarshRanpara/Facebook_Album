# Facebook_Album

Facebook album slideshow.
It is a great app to see your all facebook albums at one place.

### Prerequisites

* Requires PHP 5.6+

### Installing

* You will first need to create a Facebook app to obtain an App ID and App Secret. Facebook Developers
* Next update the config.php config values to fit your needs:

```
$FB = new \Facebook\Facebook([
        'app_id' => '{Your facebook App id}',                         // Facebook App ID
        'app_secret' => '{Your facebook App Secret key}',             // Facebook App Secret key
        'default_graph_version' => 'v3.1'
    ]);
```

## Acknowledgments

* This project was created for rtCamp web-engineer [assignment](https://careers.rtcamp.com/web-engineer/assignments/)

