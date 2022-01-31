    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="input-group">
                            <div class="container">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>First Name</label>
                                        <input type="text" aria-label="FirstName" class="form-control"required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Last Name</label>
                                        <input type="text" aria-label="LaststName" class="form-control"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"required>
                                </div>
                              
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phoneNumber" class="form-control" required>
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label" >Prefered method of contact?</label><br>
                                   <div class="row">
                                       <div class="col-6">
                                            <input class="form-check-input" type="checkbox">
                                            <label >Email</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-check-input" type="checkbox">
                                            <label >Phone</label>
                                        </div>
                                   </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label > Service required</label>
                                    <select name="servise" id="">
                                        <option value="">haircuting</option>
                                        <option value="">Beard Shaving</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label > Stylist preferred</label>
                                    <select name="servise" id="">
                                        <option value="">Jay Ramzee</option>
                                        <option value="">Chris Worth</option>
                                        <option value="">Dan Fisher</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="datetime-local" name="Date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Other details you may wish to highlight</label>
                                    <input type="textarea" name="comment" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Request an Appointment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>