const { VueLoaderPlugin } = require('vue-loader')
const Path = require("path");

module.exports = (mode) => {
    return {
        mode: mode ? mode : 'development',
        entry: {
            app: Path.join(__dirname, '/resources/js/app.js'),
        },
        output: {
            filename: '[name].js',
            path: Path.join(__dirname, '/public/js'),
            publicPath: './public/js/',
        },
        module: {
            rules: [
                {
                    test: /\.js$/,
                    loader: 'babel-loader'
                },
                {
                    test: /\.vue$/,
                    loader: 'vue-loader'
                }
            ]
        },
        plugins: [
            new VueLoaderPlugin(),
        ]
    };
}
