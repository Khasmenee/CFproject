@extends('layouts.app')
<!DOCTYPE html>
<html>
<body class="bg-light">
<br><br><br>
<div class="container">
<h4 class="mb-3">ที่อยู่การจัดส่ง</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">ชื่อ-สกุล</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>
            
            <div class="col-12">
              <label for="email" class="form-label">อีเมล</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">ที่อยู่</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">เพิ่มที่อยู่</button>
                <a href="{{ url('/dashboard/categories') }}" class="btn btn-danger">ยกเลิก</a>
            </div>
            </form>
            </div>
          </div>
          
         
		
          </body>
</html>