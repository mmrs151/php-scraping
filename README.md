# What does it do
The application goes to the website called https://wltest.dns-systems.net and scrape the product data and represent
in a json array sorted by yearly cost, from most expensive first.



To install the app:

    make install

To Run tests:

    make test

To Run the app

    make run

### Sample output
```json
[
    {
        "title": "Optimum: 2 GB Data - 12 Months",
        "description": "The optimum subscription providing you with enough service time to support the above-average user to enable your device to be up and running with inclusive Data and SMS services",
        "price": 191.88,
        "discount": 0
    },
    {
        "title": "Optimum: 24GB Data - 1 Year",
        "description": "The optimum subscription providing you with enough service time to support the above-average with data and SMS services to allow access to your device.",
        "price": 174,
        "discount": 17.9
    },
    {
        "title": "Standard: 1GB Data - 12 Months",
        "description": "The standard subscription providing you with enough service time to support the average user to enable your device to be up and running with inclusive Data and SMS services.",
        "price": 119.88,
        "discount": 0
    },
    {
        "title": "Standard: 12GB Data - 1 Year",
        "description": "The standard subscription providing you with enough service time to support the average user with Data and SMS services to allow access to your device.",
        "price": 108,
        "discount": 11.9
    },
    {
        "title": "Basic: 500MB Data - 12 Months",
        "description": "The basic starter subscription providing you with all you need to get your device up and running with inclusive Data and SMS services.",
        "price": 71.88,
        "discount": 0
    },
    {
        "title": "Basic: 6GB Data - 1 Year",
        "description": "The basic starter subscription providing you with all you need to get you up and running with Data and SMS services to allow access to your device.",
        "price": 66,
        "discount": 5.86
    }
]
```