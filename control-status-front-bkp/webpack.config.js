const modDev = process.env.NODE_ENV !== 'production'

const path = require("path")
const webpack = require("webpack")
const ExtractTextPlugin = require("extract-text-webpack-plugin")
const UglifyJSPlugin = require("uglifyjs-webpack-plugin")
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const VueLoaderPlugin = require('vue-loader/lib/plugin')

module.exports = {
    mode: modDev ? 'development' : 'production',
    entry: './src/main.js',
    output: {
        path: __dirname + '/public',
        publicPath: '/public/',
        filename: './bundle.js'
    },
    devServer: {
        port: 8080,
        contentBase: './public'
    },
    // optimization: {
    //     minimize: [
    //         new UglifyJSPlugin({
    //             cache: true,
    //             parallel: true
    //         }),
    //         new OptimizeCSSAssetsPlugin({})
    //     ]
    // },
    plugins: [
        new ExtractTextPlugin({
            filename: "app.css"
        }),
        new UglifyJSPlugin({
            sourceMap: true,
            cache: true,
            parallel: true
        }),
        new MiniCssExtractPlugin({
            filename: "style.css"
        }),
        new OptimizeCSSAssetsPlugin({}),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),
        new VueLoaderPlugin()
    ],
    module: {
        rules: [
            // {
            //     test: /\.vue$/,
            //     loader: 'vue-loader',
            //     options: {
            //         loaders: {
            //             // Since sass-loader (weirdly) has SCSS as its default parse mode, we map
            //             // the "scss" and "sass" values for the lang attribute to the right configs here.
            //             // other preprocessors should work out of the box, no loader config like this necessary.
            //             'scss': [
            //                 'vue-style-loader',
            //                 'css-loader',
            //                 'sass-loader'
            //             ],
            //             'sass': [
            //                 'vue-style-loader',
            //                 'css-loader',
            //                 'sass-loader?indentedSyntax'
            //             ]
            //         }
            //         // other vue-loader options go here
            //     }
            // },

            {
                test: /\.vue$/,
                // use: 'vue-loader'
                loader: 'vue-loader'
                // options: {
                //     loaders: {
                //         // Since sass-loader (weirdly) has SCSS as its default parse mode, we map
                //         // the "scss" and "sass" values for the lang attribute to the right configs here.
                //         // other preprocessors should work out of the box, no loader config like this nessessary.
                //         'scss': 'vue-style-loader!css-loader!sass-loader',
                //         'sass': 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
                //     }
                //     // other vue-loader options go here
                // }
            },

            {
                test: /\.js$/,
                loader: 'babel-loader',
                exclude: /node_module/,
                query: {
                    // presets: ['es2015']
                    plugins: ['transform-object-rest-spread']
                }
            },
            {
                // test: /\.css$/,
                // loader:'style!css!'
                // loader: ExtractTextPlugin.extract("style-loader", "css-loader")
                // test: /\.css$/,
                // loader:[ 'style-loader', 'css-loader' ]
                test: /\.s?[ac]ss$/,
                use:[
                    MiniCssExtractPlugin.loader,
                    //'style-loader', // Adiciona CSS a DOM injetando a tag <style>
                    'css-loader', // Interpreta @import, url()...
                    'sass-loader'
                ]
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/,
                use: ['file-loader']
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'fonts/'
                    }
                }]
            }
        ]
    },
    // resolve: {
    //     alias: {
    //         'vue$': 'vue/dist/vue.esm.js'
    //     },
    //     extensions: ['*', '.js', '.vue', '.json']
    // },
    // devServer: {
    //     historyApiFallback: true,
    //     noInfo: true,
    //     overlay: true
    // },
    // performance: {
    //     hints: false
    // },
    // devtool: '#eval-source-map',

    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.common.js'
        }
    },
    devServer: {
        historyApiFallback: true,
        noInfo: true
    },
    performance: {
        hints: false
    },
    devtool: '#eval-source-map',

    watch: true
}