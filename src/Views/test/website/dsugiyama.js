var webdriver = require('selenium-webdriver');
var chrome = require('selenium-webdriver/chrome');
var expect = require('expect.js');
var assert = require('assert');
var request = require('request');
var token = require('/home/www/d.sugiyama/src/Views/test/website/token');
describe('D.Sugiyama Test', function(){
    this.timeout(15000);
    let driver;

    const moment = require('moment');
    const currentTime = moment();
    console.log(currentTime.format("YYYYMMDDHHmmss"));
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

    describe('TOPページ https://daichisugiyama.jp', function(){
        it('タイトル：Daichi Sugiyama', async function() {
            await driver.get('https://daichisugiyama.jp');
            const title = await driver.getTitle();
            if(title == "Daichi Sugiyama")
            {
                console.log('daichisugiyama.jp pass');
                var options = {
                    url: 'https://daichisugiyama.jp/test/website-pass',
                    method: 'POST',
                    form:
                    {
                        "token": token,
                        "sitename": "Daichi Sugiyama",
                        "url": "https://daichisugiyama.jp"
                    }
                }
                request(options, function (error, response, body) {
                    console.log(body);
                })
            }
            else
            {
                console.log('daichisugiyama.jp fail');
                var options = {
                    url: 'https://daichisugiyama.jp/test/website-fail',
                    method: 'POST',
                    form:
                    {
                        "token": token,
                        "sitename": "Daichi Sugiyama",
                        "url": "https://daichisugiyama.jp"
                    }
                }
                request(options, function (error, response, body) {
                    console.log(body);
                })
            }
        });
    });

});