/**
 * Commands:
 *
 * npm run dev
 * npm run prod
 * npm run watch
 * npm run watch-poll
 */
const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');

/** Get all files from current folder **/
const getFiles = function (dir) {
    return fs.readdirSync(dir).filter(file => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
};

/** Get all files from folder recursively **/
const getAllFiles = dir => fs.readdirSync(dir).reduce((files, file) => {
    const name = path.join(dir, file);
    const isDirectory = fs.statSync(name).isDirectory();
    return isDirectory ? [...files, ...getAllFiles(name)] : [...files, name];
}, []);

mix.autoload({
    jquery: ['$', 'window.jQuery'],
});

mix.babelConfig({
    plugins: [
        '@babel/plugin-proposal-class-properties',
        '@babel/plugin-proposal-object-rest-spread',
        '@babel/plugin-syntax-dynamic-import',
    ]
});

mix.options({
    processCssUrls: false,
    lessOptions: {
        strictMath: false,
        math: 'always',
        compress: false
    }
});

mix.setPublicPath('./public');

/*
 |--------------------------------------------------------------------------
 | Mix Assets Management
 |--------------------------------------------------------------------------
 */

const resourcesPath = 'resources/assets';
const scssPath = `${resourcesPath}/scss`;
const scssBlocks = `${scssPath}/blocks/`;
const scssAdmin = `${scssPath}/admin/`;
const imagesPath = `${resourcesPath}/images`;
const fontsPath = `${resourcesPath}/fonts`;
const jsPath = `${resourcesPath}/js`;

// scss main
getFiles(scssPath).forEach((filepath) => {
    mix.sass(`${scssPath}/${filepath}`, 'css/');
});

// scss blocks
getFiles(scssBlocks).forEach((filepath) => {
    mix.sass(`${scssBlocks}/${filepath}`, 'css/');
});

// scss admin
getFiles(scssAdmin).forEach((filepath) => {
    mix.sass(`${scssAdmin}/${filepath}`, 'css/');
});

// js
getAllFiles(jsPath).forEach( (file) => {
    if(file.split('.').pop() != 'gitkeep'){
        mix.js(file, file.replace(jsPath, 'js'));
    }
});

mix.copyDirectory(imagesPath, 'public/images')
    .copyDirectory(fontsPath, 'public/fonts');

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    }).sourceMaps()
}

if (mix.inProduction()) {
    mix.version();
}
