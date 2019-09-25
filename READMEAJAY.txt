https://github.com/viralsolani/laravel-adminpanel

Port Module:
**************************************Start**************************************
App\Models\Port\Port.php
App\Models\Port\Traits\PortsAttribute.php
App\Models\Port\Traits\PortsRelationship.php

App\Http\Controllers\Port\PortsController.php
App\Http\Controllers\Port\PortsTableController.php

App\Http\Requests\Port\CreatePortsRequest.php
App\Http\Requests\Port\StorePortsRequest.php
App\Http\Requests\Port\EditPortsRequest.php
App\Http\Requests\Port\UpdatePortsRequest.php
App\Http\Requests\Port\DeletePortsRequest.php

resources\views\ports\index.blade.php
resources\views\ports\create.blade.php
resources\views\ports\edit.blade.php
resources\views\ports\form.blade.php

routes\Generator\Port.php

App\Repositories\Port\PortsRepository.php
********************************End*******************************************


############### Stripe Payment Integration Process
Dummy card Detail
4242 4242 4242 4242
1: composer require stripe/stripe-php

Testing Data
Visa Card No. : 4242424242424242
Mobile No. : 9898989898
OTP No. : 123456

############ Razor payment Gateway Integration
Step1: composer require razorpay/razorpay

