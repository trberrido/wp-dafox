import fs from 'node:fs';

const items = [
    'assets',
    'functions',
    'languages',
    'parts',
    'patterns',
    'templates',
    'functions.php',
    'screenshot.png',
    'style.css',
    'theme.json',
    'update.html'
];

fs.rmSync('release', {recursive: true, force: true});
fs.mkdirSync('release');

for (const item of items){
    fs.cpSync(item, `release/${item}`, {recursive: true});
}