const SUPPORTED_THEMES = [
  "bootstrap",
  "brite",
  "cerulean",
  "cosmo",
  "cyborg",
  "flatly",
  "journal",
  "litera",
  "lumen",
  "lux",
  "materia",
  "minty",
  "morph",
  "pulse",
  "quartz",
  "sandstone",
  "simplex",
  "sketchy",
  "slate",
  "solar",
  "spacelab",
  "superhero",
  "united",
  "vapor",
  "yeti",
  "zephyr"
];;

let theme = localStorage.getItem('app_theme') === null ? 'united' : localStorage.getItem('app_theme');

if (localStorage.getItem('app_theme') === null && localStorage.getItem('theme') == 'dark') {
    theme = 'slate';
}

let link = document.createElement("link");
link.rel = "stylesheet";
link.href = `/assets/css/bootswatch/${theme}.min.css`;
link.crossOrigin = "anonymous";

document.head.appendChild(link);

document.addEventListener('DOMContentLoaded', function () {

    enableThemeToggle("#theme_toggle");

    const links = document.querySelectorAll('.link-primary');
    const darkThemes = ['darkly', 'slate'];
    if (links) {
        if (darkThemes.includes(theme)) {
            links.forEach(link => {
                link.classList.remove('link-primary');
            });
        }
    }
});

function enableThemeToggle(selector){
    const select = document.querySelector(selector);

    if(!select) return;

    let options = "";
    SUPPORTED_THEMES.forEach(t => {
        options += `<option value='${t}' ${theme == t ? 'selected' : ''}>${t}</option>`;
    });
    select.innerHTML = options;

    select.addEventListener('change', ()=>{
        localStorage.setItem('app_theme', select.value);
        window.location.reload();
    });

}

