### Aufruf erstelltes Package

    {
        "name": "test/test",
        "description": "simple Test",
        "type": "project",
        "license": "MIT",
        "authors": [
            {
                "name": "Stephan Krauss",
                "email": "info@stephankrauss.de"
            }
        ],
        "minimum-stability": "dev",
        "require": {},
        "repositories": [
        {
            "type": "package",
            "package": {
                "name": "StephanKrauss/Testify",
                "version": "dev-master",
                "source": {
                    "url": "git://github.com/StephanKrauss/Testify.php.git",
                    "type": "git",
                    "reference": "master"
                },
                "autoload": {
                    "psr-4" : {
                        "StephanKrauss\\Testify\\" : "src"
                    }
                }
            }
        }
    ]
    }