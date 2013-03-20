/**
* Provide the HTML to create the modal dialog.
*/
//прошу обратить внимание, в конце название переменной - название нашей темы
Drupal.theme.prototype.CToolsULModal = function () {
  var html = '';
  //необходимая часть
  html += '<div id="ctools-modal">';
  //тут наш html
  html += '    <div id="ul_modal-block" class="ul_modal-block ">';
  //тут вставляется тайтл оставляем без изменений
  html += '              <span id="modal-title" class="modal-title"></span>';
  //кнопка закрытия окна
  html += '              <span class="popups-close"><a class="close" href="#"></a></span>';
  //тут наш html
  html += '              <div class="clear-block"></div>';
  //далее выводиться контент
  html += '           <div class="popups-container">';
  html += '             <div class="modal-scroll"><div id="modal-content" class="modal-content popups-body"></div></div>';  
  html += '          </div>';
  //тут наш html
  html += '         <div class="clearboth"></div>';

  html += ' </div>';
  html += '</div>';

  return html;

}