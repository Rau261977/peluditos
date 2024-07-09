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
		clean: true, // Esto asegura que la carpeta de salida se limpie antes de cada compilación
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
		},
	},
	performance: {
		maxAssetSize: 244000,
		maxEntrypointSize: 244000,
		hints: 'warning',
	},
};
