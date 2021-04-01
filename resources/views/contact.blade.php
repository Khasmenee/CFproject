@extends('layouts.app')
<br><br><br><br>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-heading">
						ติดต่อเรา
					</div>
					<div class="card-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">ชื่อ-สกุล</label>
									<div class="col-md-9">
										<input id="name" name="name" type="text" placeholder="Your name" class="form-control">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">อีเมล</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control">
									</div>
								</div>
								
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">ข้อความ</label>
									<div class="col-md-9">
										<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group row mb-0">
                            		<div class="col-md-8 offset-md-4">
                                		<button type="submit" class="btn btn-primary">
                                    		ส่งข้อความ
                                		</button>
                            		</div>
                        		</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
