// trigger extension
ace.require("ace/ext/language_tools");

var editor = ace.edit("editor");


editor.setTheme("ace/theme/monokai");
editor.setFontSize(16);
//editor.setTheme("ace/theme/tomorrow");
editor.session.setMode("ace/mode/html");


// enable autocompletion and snippets
editor.setOptions({
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: true
});