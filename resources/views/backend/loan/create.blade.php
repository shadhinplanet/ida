@extends('backend.layouts.master')

@section('title', 'IDA | Add New Loan')
@section('page', 'Add New Loan')

@section('content')

    <div class="bg-white p-8 rounded-md">


        @if ($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif


        <form action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data" id="memberForm">
            @csrf
            <div class="flex items-center" id="clientType">
                <label for="fathersName" class="w-[18%]">Client Type</label>

                <div class="pl-1">
                    <input type="radio" id="newClient" name="clientType" value="new"
                        {{ old('clientType') == 'new' ? 'checked' : '' }} />
                    <label for="newClient" class="ml-2 mr-4 cursor-pointer">New Client</label>

                    <input type="radio" id="oldClient" name="clientType" value="old"
                        {{ old('clientType') == 'old' ? 'checked' : '' }} />
                    <label for="oldClient" class="ml-2 mr-4 cursor-pointer">Old Client</label>

                    <input type="radio" id="member" name="clientType" value="member"
                        {{ old('clientType') == 'member' ? 'checked' : '' }} />
                    <label for="member" class="ml-2 mr-4 cursor-pointer">Member</label>
                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex-2 w-3/4">
                    <div class="flex items-center mt-3" id="clientName">
                        <label for="name" class="w-1/3">Name</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>
                    <div class="flex items-center mt-3" id="memberInput">
                        <label for="memberInput" class="w-1/3">Member</label>
                        <select name="memberInput" id="memberInput" class="w-full border-gray-300 rounded-lg shadow-sm">
                            <option value="">Please select member</option>
                            <option value="">Please select</option>
                        </select>
                    </div>

                    <div class="flex items-center mt-3" id="clientSelect">
                        <label for="memberInput" class="w-1/3">Client Name</label>
                        <select name="memberInput" id="memberInput" class="w-full border-gray-300 rounded-lg shadow-sm">
                            <option value="">Please select client name</option>
                            <option value="">Please select</option>
                        </select>
                    </div>

                    <div class="flex items-center mt-3">
                        <label for="fathersName" class="w-1/3">Father's Name</label>
                        <input type="text" name="fathersName" id="fathersName"
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>
                    <div class="flex mt-3 items-center">
                        <label for="nid" class="w-1/3">NID</label>
                        <input type="text" name="nid" id="nid" class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>
                    <div class="flex mt-3 items-center">
                        <label for="email" class="w-1/3">Email</label>
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>

                    <div class="flex mt-3 items-center">
                        <label for="phone" class="w-1/3">Phone</label>
                        <input type="number" name="phone" id="phone" required
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>
                </div>
                <!-- src="http://via.placeholder.com/240x200" -->
                <div class="pl-8 flex items-center">
                    <div class="flex flex-col justify-center items-center">
                        <img id="previewImg" src="https://api.lorem.space/image/movie?w=150&h=220" alt="Placeholder"
                            class="w-48 max-h-52 rounded-md" />
                        <label for="thumbnail"
                            class="cursor-pointer border-2 border-dashed border-sky-700 rounded-md py-1 px-10 mt-4 text-center">Upload
                            Image</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="hidden"
                            onchange="previewFile(this)" />
                    </div>
                </div>
            </div>

            <div class="flex mt-3">
                <label for="address" class="w-[23%]">Address</label>
                <textarea name="address" id="address" rows="4" cols="50"
                    class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
            </div>

            <div class="" id="businessTypeArea">
                <div class="w-full border-2 bottom-1 mt-6"></div>
                <div class="flex mt-4">
                    <div class="flex flex-1 mt-3 items-center">
                        <label for="businessType" class="w-1/2">Business Type</label>
                        <select name="businessType" id="businessType" class="w-full border-gray-300 rounded-lg shadow-sm">
                            <option value="none">Select Type</option>
                            <option value="Cow Business">Cow Business</option>
                            <option value="Marrige">Marrige</option>
                            <option value="Devorce">Devorce</option>
                        </select>
                    </div>

                    <div class="flex flex-1 mt-3 items-center ml-4"></div>
                </div>
                <div class="flex">
                    <div class="flex flex-1 mt-3 items-center">
                        <label for="loanAmount" class="w-1/2">Loan Amount</label>
                        <input type="number" name="loanAmount" id="loanAmount" autocomplete="email"
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>

                    <div class="flex flex-1 mt-3 items-center ml-4">
                        <label for="loanDate" class="w-1/2">Loan Date</label>
                        <input type="date" name="loanDate" id="loanDate" autocomplete="email"
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>
                </div>
                <div class="flex">
                    <div class="flex flex-1 mt-3 items-center">
                        <label for="returnAmount" class="w-1/2">Return Amount</label>
                        <input type="number" name="returnAmount" id="returnAmount" autocomplete="email"
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>

                    <div class="flex flex-1 mt-3 items-center ml-4">
                        <label for="returnDate" class="w-1/2">Return Date</label>
                        <input type="date" name="returnDate" id="returnDate" autocomplete="email"
                            class="w-full border-gray-300 rounded-lg shadow-sm" />
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center mt-6 py-6">
                <button type="button" class="btn btn_primary" id="formClear">
                    Clear
                </button>
                <button type="submit" class="btn btn_secondary">Save</button>
            </div>
        </form>
    </div>


@endsection
