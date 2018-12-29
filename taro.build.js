let command = require('node-cmd'),
    AfterWebpack = require('on-build-webpack');

module.exports = {
    taro: new AfterWebpack(() => {
        command.get('php taro build', (error, stdout, stderr) => {
            console.log(error ? stderr : stdout);
        });
    })
}