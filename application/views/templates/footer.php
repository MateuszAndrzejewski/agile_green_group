<?php

  defined('BASEPATH') OR exit('No direct script access allowed.');

?>

<div id="search" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Search selected text</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-12">
                      <input class="form-control" type="text" id="selected" disabled>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <form>
                <select id="language" class="form-control input-medium bfh-languages" data-language="en"></select>
              </form>
              <button type="button" class="btn btn-secondary">
                <a id="wikipedia" target="_blank">Search in Wikipedia</a>
              </button>

              <button type="submit" class="btn btn-secondary">
                <a id="synonym" target="_blank">Search synonym</a>
              </button>

            </div>
        </div>
    </div>
</div>


<img class="BCHbadge" src='https://bettercodehub.com/edge/badge/jjkazimierski/agile_green_group?branch=master'>

</body>
</html>
