const postcssPresetEnv = require('postcss-preset-env')
const postcssImport = require('postcss-import')
const autoprefixer = require('autoprefixer')
const cssnano = require('cssnano')
const postcssMixins = require('postcss-mixins')

module.exports = {
    plugins: [
        postcssPresetEnv({
            grid: 'autoplace',
        }),
        postcssImport({
            path: ['./*','./src', './node_modules']
        }),
        autoprefixer({
            grid: true,
        }),
        cssnano({
            preset: 'default',
        }),
        postcssMixins({
            global: true,
            includePaths: ['./src/inc/*.css'],
        }),
        
    ],
};