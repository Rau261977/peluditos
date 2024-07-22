const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
	mode: 'production',
	entry: {
		main: './src/main.js',
	},
	output: {
		filename: '[name].[contenthash].js',
		path: path.resolve(__dirname, 'dist'),
		clean: true,
	},
	module: {
		rules: [
			{
				test: /\.css$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader'],
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].[contenthash].css',
		}),
	],
	optimization: {
		splitChunks: {
			chunks: 'all',
			cacheGroups: {
				vendors: {
					test: /[\\/]node_modules[\\/]/,
					name: 'vendors',
					chunks: 'all',
				},
				common: {
					name: 'common',
					minChunks: 2,
					chunks: 'all',
				},
			},
		},
	},
	performance: {
		maxAssetSize: 512000,
		maxEntrypointSize: 512000,
		hints: 'warning',
	},
	devtool: 'source-map',
};
