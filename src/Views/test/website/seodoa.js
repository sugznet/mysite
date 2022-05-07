var webdriver = require('selenium-webdriver');
var chrome = require('selenium-webdriver/chrome');
var expect = require('expect.js');
var assert = require('assert');
var request = require('request');
var token = require('/home/www/d.sugiyama/src/Views/test/website/token');
describe('SEODOAテスト', function(){
    this.timeout(15000);
    let driver;

    before(() => {
        var options = new chrome.Options();
        options.addArguments("--headless");
        driver = new webdriver.Builder()
                    .withCapabilities(webdriver.Capabilities.chrome())
                    .setChromeOptions(options)
                    .setChromeService(new chrome.ServiceBuilder("/usr/local/bin/chromedriver"))
                    .build();
    });

    after(() => {
        driver.quit();
    });

    describe('TOPページ https://yaidu-seodoa.com', function(){
        it('SEODOA', async function() {
            await driver.get('https://yaidu-seodoa.com');
            const title = await driver.getTitle();
            // assert.equal(title, "セオドア(SEODOA) 静岡県焼津のリラクゼーション マッサージ メンズエステ");


            if(title == "セオドア(SEODOA) 静岡県焼津のリラクゼーション マッサージ メンズエステ")
            {
                console.log('yaidu-seodoa.com pass');
                var options = {
                    url: 'https://daichisugiyama.jp/test/website-pass',
                    method: 'POST',
                    form:
                    {
                        "token": token,
                        "sitename": "SEODOA",
                        "url": "https://yaidu-seodoa.com"
                    }
                }
                request(options, function (error, response, body) {
 
                    console.log(body);
                 
                })
            }
            else
            {
                console.log('yaidu-seodoa.com fail');
                var options = {
                    url: 'https://daichisugiyama.jp/test/website-fail',
                    method: 'POST',
                    form:
                    {
                        "token": token,
                        "sitename": "SEODOA",
                        "url": "https://yaidu-seodoa.com"
                    }
                }
                request(options, function (error, response, body) {
 
                    console.log(body);
                 
                })
            }
        });

    });



});