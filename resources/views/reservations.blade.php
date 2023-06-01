<form method="post" id="reservation-form" action={{ action('PageController@postReservation') }}>
    {{ @csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <label>Name*</label>
            <p><input type="text" name="name" class="reservation-fields" required/></p>
        </div>
        <div class="col-md-4">
            <label>Email*</label>
            <p><input type="text" name="email" class="reservation-fields" required/></p>
        </div>
        <div class="col-md-4">
            <label>Phone*</label>
            <p><input type="text" name="phone" class="reservation-fields" required/></p>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-md-4">
            <label>Date*</label>
            <p><input type="date" name="datepicker" id="datepicker" class="reservation-fields" size="30" required/></p>
        </div>
        <div class="col-md-4">
            <label>Time*</label>
            <p>
                <select name="time" class="reservation-fields" >
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                </select>
            </p>
        </div>
        <div class="col-md-4">
            <label>Seats*</label>
            <p><input type="text" name="seats" class="reservation-fields" required/></p>
        </div>
    </div>
    <!--end row-->
    <label>Special Requests</label>
    <p> <textarea name="message" id="message2" class="reservation-fields" cols="100" rows="4" tabindex="4"></textarea></p>
    <p class="antispam">Leave this empty: <input type="text" name="url" /></p>
    <p class="alignc"><input type="submit" value="Book Now" id="submit" /></p>
</form>
