const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const WebpackNotifierPlugin = require('webpack-notifier');

const env = process.env.NODE_ENV || 'development';

// This is the URL path relative to the root domain.
const publicPath = '/wp-content/themes/fathom/';

// These are the paths where different types of resources should end up.
const paths = {
	css: 'assets/css/',
	img: 'assets/img/',
	font: 'assets/font/',
	js: 'assets/js/',
	lang: 'languages/',
};

// The property names will be the file names, the values are the files that should be included.
const entry = {
	style: [
		'./src/scss/style.scss',
	],
	/*editor: [
		'./build/js/editor.js',
		'./build/scss/editor.scss',
	],*/
};

const loaders = {
	css: {
		loader: 'css-loader',
		options: {
			url: false,
			sourceMap: true,
		}
	},
	postCss: {
		loader: 'postcss-loader',
		options: {
			postcssOptions: {
				plugins: [
					require('autoprefixer'),
				]
			}
		}
	},
	sass: {
		loader: 'sass-loader',
		options: {
			sourceMap: true,
			sassOptions: {
				outputStyle: 'expanded'
			}
		}
	}
}

// Let's put our configuration together
module.exports = {
	entry: entry,
	output: {
		filename: `${ paths.js }[name].js`,
		path: path.join(__dirname, '/'),
	},
	mode: env,
	stats: {
		children: false,
	},
	optimization: {
		minimizer: [
			new OptimizeCSSAssetsPlugin({}),
			new TerserPlugin({}),
		]
	},
	module: {
		// Pass in our loaders to handle file types appropriately
		rules: [
			// Run our JS through babel for ES6 and JS Modules support
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'babel-loader',
				options: {
					presets: ['@babel/preset-env']
				},
			},
			// Handle our .scss files through our loaders
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					loaders.css,
					loaders.postCss,
					loaders.sass
				],
				exclude: /node_modules/,
			},
		]
	},
	plugins: [
		// Tell webpack to output our CSS to a separate file, not within our JS
		new MiniCssExtractPlugin('[name].css'),
		// Notify Webpack events
		new WebpackNotifierPlugin({alwaysNotify: true}),
	],
}