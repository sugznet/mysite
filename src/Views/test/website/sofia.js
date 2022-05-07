var webdriver = require('selenium-webdriver');
var chrome = require('selenium-webdriver/chrome');
var expect = require('expect.js');
var assert = require('assert');
var request = require('request');
var token = require('/home/www/d.sugiyama/src/Views/test/website/token');
describe('SOFIAテスト', function(){
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

    describe('TOPページ https://yaidu-sofia.com', function(){
        it('モーガン', async function() {
            await driver.get('https://yaidu-sofia.com');
            const title = await driver.getTitle();
            // assert.equal(title, "セオドア(SEODOA) 静岡県焼津のリラクゼーション マッサージ メンズエステ");

            if(title == "ソフィアモーガン(SOFIA MORGAN) 静岡県焼津のリラクゼーション マッサージ メンズエステ")
            {
                var options = {
                    url: 'https://daichisugiyama.jp/test/website-pass',
                    method: 'POST',
                    form:
                    {
                        "token": token,
                        "sitename": "モーガン",
                        "url": "https://yaidu-sofia.com"
                    }
                }
                request(options, function (error, response, body) {
 
                    console.log(body);
                 
                })
            }
            else
            {
                var options = {
                    url: 'https://daichisugiyama.jp/test/website-fail',
                    method: 'POST',
                    form:
                    {
                        "token": token,
                        "sitename": "モーガン",
                        "url": "https://yaidu-sofia.com"
                    }
                }
                request(options, function (error, response, body) {
 
                    console.log(body);
                 
                })
            }
        });

    });
});