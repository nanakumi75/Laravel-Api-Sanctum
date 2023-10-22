<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center text-primary">Contact Us</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto bg-light bordered rounded p-3">
           <div class="my-3">
            @if(Session::has('success'))
               <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
           </div>
           <form wire:submit.prevent="SubmitContactForm" action="{{ URL::to('/contact') }}" method="post">
                @csrf
                <div class="my-3">
                    <label for="name">Full name</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <input type="text" wire:model.live="name" name="name" id="" class="form-control form-control-lg" placeholder="Enter full name....">
                     </div>
                     <div class="my-2">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                </div>
                <div class="my-3">
                    <label for="email">Email Address</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="text" wire:model.live="email" name="email" id="" class="form-control form-control-lg" placeholder="Enter email....">
                     </div>
                     <div class="my-2">
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                </div>
                <div class="my-3">
                    <label for="subject">Subject</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-question"></i></span>
                        <input type="text" wire:model.live="subject" name="subject" id="" class="form-control form-control-lg" placeholder="Enter subject....">
                     </div>
                     <div class="my-2">
                        @error('subject')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                </div>
                <div class="my-3">
                    <label for="message">Message</label>
                     <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                        <textarea wire:model.live="message" name="message" id="" class="form-control" placeholder="Enter full name...."></textarea>
                     </div>
                     <div class="my-2">
                        @error('message')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>
                </div>
                <div class="my-3">
                    <input type="submit" value="Send Message" class="form-control btn btn-lg btn-primary">
                </div>
          </form>
        </div>
    </div>
</div>
