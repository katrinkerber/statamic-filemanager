<?php
class Hooks_filemanager extends Hooks {

  public function control_panel__add_to_head()
  {
      if (URL::getCurrent(false) == '/publish') {
        return $this->css->link('filemanager.css');
      }
  }

  public function control_panel__add_to_foot()
  {
      if (URL::getCurrent(false) == '/publish') {
        $html = "<script>
          // See https://github.com/simogeo/Filemanager/wiki/How-to-use-the-filemanager-from-a-simple-textfield-%3F
          var urlobj;

          function BrowseServer(obj)
          {
              urlobj = obj;
              OpenServerBrowser(
              '".Config::getSiteRoot()."_add-ons/filemanager/lib/index.html',
              screen.width * 0.7,
              screen.height * 0.7 ) ;
          }

          function OpenServerBrowser( url, width, height )
          {
              var iLeft = (screen.width - width) / 2 ;
              var iTop = (screen.height - height) / 2 ;
              var sOptions = 'toolbar=no,scrollbars=no,status=no,resizable=yes,dependent=yes' ;
              sOptions += ',width=' + width ;
              sOptions += ',height=' + height ;
              sOptions += ',left=' + iLeft ;
              sOptions += ',top=' + iTop ;
              var oWindow = window.open( url, 'BrowseWindow', sOptions ) ;
          }

          function SetUrl( url, width, height, alt )
          {
              $('.filemanager-container input[name=\"' + urlobj + '\"]').val(url);
              console.log(urlobj);
              oWindow = null;
          }

          // remove file function
          function removeFile(button) {
            // 1. clear data in input and remove image thumb and paragraph containing file name
            button.siblings('input').val('').end().siblings('img').remove();
            // 2. convert remove button to add file button
            button.removeClass('remove-file').addClass('add-file').html('Choose File');
          }

          // adding and removing file calls
          $(document).ready(function() {
            $('body').on('click', 'button.filemanager', function() {
              if( $(this).hasClass('add-file') ) {
                var fieldName = $(this).prev('input').attr('name');
                BrowseServer(fieldName);
              } else {
                removeFile($(this));
              }
            });

          });
         </script>";
        
        return $html;
      }
  }
}
