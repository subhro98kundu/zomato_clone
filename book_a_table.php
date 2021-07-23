<div class="modal fade" id="bookTableModal" tabindex="-1" role="dialog" aria-labelledby="bookTableModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Book a Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="create_book_request.php" method="POST">
          <input type="text" name="inthenameof" class="form-control" required="true" placeholder="Name of the person"><br>
          <input type="time" name="timing" class="form-control" required="true"><br>
          <input type="number" name="duration" class="form-control" min="1" max="3" required="true" placeholder="Duration in hours"><br>
          <input type="hidden" name="res_id" readonly="true" value="<?php echo($res_id); ?>"><br>
          <input type="number" name="table_no" class="form-control" min="1" max="4" required="true" placeholder="Number of tables you want to book ( < 5)"><br>
          <input type="submit" name="submit" class="btn btn-danger btn-block">
        </form>
      </div>
    </div>
  </div>
</div>