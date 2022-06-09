# Behat training

## Slides

https://knplabs.slides.com/d/xqNk8HI/live

## How to use it

### **Start**

In order to start the project just run:

```bash
make start
```

It will build, run and install the necessary dependencies.

### **Stop**

In order to stop the project run:

```bash
make stop
```

### **Behat**

Once you installed behat you can run it using:

```bash
make behat
```

It will run all tests.

If you want to pass some arguments to behat command you can do it by setting the `ARGS` var:

```bash
make behat ARGS=--help
```

### **Crawler**

Once you'll have written your Mink crawler you'll be able to run it using:

```bash
make crawler
```

### **Run any other command**

In order to run any other command in the PHP container you can use the following:

```bash
make run CMD="composer require ..."
```

## Debug headless Chrome

chrome://inspect/#devices

## Read (or view) more about it

B(ehavior) D(riven) D(evelopment): https://dannorth.net/introducing-bdd/

D(omain) D(riven) D(esign): https://martinfowler.com/bliki/DomainDrivenDesign.html

Ubiquitous language: https://martinfowler.com/bliki/UbiquitousLanguage.html

Gherkin: https://cucumber.io/docs/gherkin/reference/

Behat: https://www.youtube.com/watch?v=QnPmbQbsTV0