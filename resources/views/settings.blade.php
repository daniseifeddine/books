@extends('layout.master_layout')
@section('title', 'home')


@section('content')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}">


    <div class="" style="min-height:100vh;padding-top:150px;padding-bottom:150px">


        @if (session()->has('old_password'))
            <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium"></span> @lang('messages.something_went_wrong')
                </div>
            </div>
        @endif

        @if (session()->has('failed_change_password'))
            <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium"></span> @lang('messages.something_went_wrong')
                </div>
            </div>
        @endif

        @if (
            $errors->has('new_password') ||
                $errors->has('confirm_password') ||
                $errors->has('old_password') ||
                $errors->has('language') ||
                $errors->has('age') ||
                $errors->has('fav_book') ||
                $errors->has('fav_author') ||
                $errors->has('city') ||
                $errors->has('country') ||
                $errors->has('worst_book') ||
                $errors->has('phone') ||
                $errors->has('birthday') ||
                $errors->has('gender') ||
                $errors->has('favorite_book_genre') ||
                $errors->has('description'))
            <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium"></span> @lang('messages.something_went_wrong')
                </div>
            </div>
        @endif


        @if (session()->has('success'))
            <div class="error flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <div>
                    <span class="font-medium"></span> {{ session('success') }}
                </div>
            </div>
        @endif
        @error('image')
            @if ($message == 'format')
                <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium"></span> @lang('messages.image_format')
                    </div>
                </div>
            @elseif ($message == 'size')
                <div class="error flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium"></span> @lang('messages.image_size')
                    </div>
                </div>
            @endif
        @enderror

        <div class="container">
            <div class="title pb-3">
                <h1 class="text-3xl">&nbsp; @lang('messages.user_setting') </h1>
            </div>
            <div class="all grid lg:grid-cols-5 md:grid-cols-2 gap-5 p-4">
                <div
                    class="box-1 p-1 rounded col-span-5 sm:col-span-5 lg:col-span-2 md:col-span-1 sm:col-span-1 grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 content-center items-center">
                    <div class="">
                        @if ($data->ProfileImage)
                            <div style=" background-image: url('{{ asset('uploads/' . $data->ProfileImage) }}');;width:200px;height:200px"
                                class="lg:w-4/5 md:w-4/5 w-5/5 sm:w-2/5 p-5 rounded-xl block shadow-xl bg-cover bg-center">
                            </div>
                        @else
                            <div style="background-image: url('{{ asset('uploads/default.jpg') }}');width:200px;height:200px"
                                class="p-5 bg-cover bg-center">

                            </div>
                        @endif
                    </div>
                    <div class="md:pt-0 lg:pt-0 pt-5">
                        <p>{{ $data->name }}</p>
                        <p>{{ $data->email }}</p>
                        <form action="{{ route('UpdateImage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            <input type="file" name="image" id="input-file" style="display: none;" accept="image/*">
                            <label class="inputbox pt-3" for="input-file"
                                style="border: 1px solid transparent;color:#007bff; cursor:pointer">
                                @lang('messages.change_image')
                            </label><br>

                            <!-- Hidden Save button -->
                            <button type="submit" id="save-btn" class="btn"
                                style="display: none;">@lang('messages.save')</button>
                        </form>
                        @if ($data->ProfileImage)
                            <form action="{{ route('RemoveImage') }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">@lang('messages.remove_image')</button>
                            </form>
                        @endif
                    </div>
                </div>
                <form action="{{ route('user_info') }}" method="post"
                    class="rounded box-1 p-2 grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-2 col-span-5 lg:col-span-3 md:col-span-3 gap-2 row-span-4">
                    {{-- language --}}
                    <div class="flex flex-col">
                        @csrf
                        @method('post')
                        <label for="" class="pb-1">@lang('messages.Language')</label>
                        <select name="language"
                            class="text-black form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                            @if (old('language', $data->language))
                                <option value={{ old('language', $data->language) }} selected>
                                    {{ old('language', $data->language) }}
                                </option>
                            @endif
                            <option value="" style="background:#3672da;color:white">Select a
                                language
                            </option>
                            <option value="English">English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">French</option>
                            <option value="German">German</option>
                            <option value="Italian">Italian</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Russian">Russian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Amharic">Amharic</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Azerbaijani">Azerbaijani</option>
                            <option value="Basque">Basque</option>
                            <option value="Belarusian">Belarusian</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Bosnian">Bosnian</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Cebuano">Cebuano</option>
                            <option value="Chichewa">Chichewa</option>
                            <option value="Corsican">Corsican</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dutch">Dutch</option>
                            <option value="Esperanto">Esperanto</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Filipino">Filipino</option>
                            <option value="Finnish">Finnish</option>
                            <option value="Frisian">Frisian</option>
                            <option value="Galician">Galician</option>
                            <option value="Georgian">Georgian</option>
                            <option value="Greek">Greek</option>
                            <option value="Gujarati">Gujarati</option>
                            <option value="Haitian Creole">Haitian Creole</option>
                            <option value="Hausa">Hausa</option>
                            <option value="Hawaiian">Hawaiian</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hmong">Hmong</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Igbo">Igbo</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Irish">Irish</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Javanese">Javanese</option>
                            <option value="Kannada">Kannada</option>
                            <option value="Kazakh">Kazakh</option>
                            <option value="Khmer">Khmer</option>
                            <option value="Korean">Korean</option>
                            <option value="Kyrgyz">Kyrgyz</option>
                            <option value="Lao">Lao</option>
                            <option value="Latin">Latin</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Luxembourgish">Luxembourgish</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malagasy">Malagasy</option>
                            <option value="Malay">Malay</option>
                            <option value="Malayalam">Malayalam</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Maori">Maori</option>
                            <option value="Marathi">Marathi</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Nepali">Nepali</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Pashto">Pashto</option>
                            <option value="Persian">Persian</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Samoan">Samoan</option>
                            <option value="Scots Gaelic">Scots Gaelic</option>
                            <option value="Serbian">Serbian</option>
                            <option value="Sesotho">Sesotho</option>
                            <option value="Shona">Shona</option>
                            <option value="Sindhi">Sindhi</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Somali">Somali</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Sundanese">Sundanese</option>
                            <option value="Swahili">Swahili</option>
                            <option value="Swedish">Swedish</option>
                            <option value="Tajik">Tajik</option>
                            <option value="Tamil">Tamil</option>
                            <option value="Tatar">Tatar</option>
                            <option value="Telugu">Telugu</option>
                            <option value="Thai">Thai</option>
                            <option value="Turkish">Turkish</option>
                        </select>
                        @error('language')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- country --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.country')</label>
                        <select name="country"
                            class="text-black form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">

                            @if (old('country', $data->country))
                                <option value={{ old('country', $data->country) }} selected>
                                    {{ old('country', $data->country) }}</option>
                            @endif
                            <option value="" style="background:#3672da;color:white">Select a
                                country
                            </option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos Keeling Islands">Cocos Keeling Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Malvinas">Malvinas</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-bissau">Guinea-bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Vatican">Vatican</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran, Islamic Republic of">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Republic of">Korea</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Moldova, Republic of">Moldova Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Helena">Saint Helena</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor-leste">Timor leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Virgin Islands, British">Virgin Islands British</option>
                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        @error('country')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- city --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.city')</label>
                        <input type="text" name="city" id="" placeholder="Washgton"
                            value="{{ old('city', $data->city) }}"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                        @error('city')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- phone --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.phone_number')</label>
                        <input type="text" name="phone" id="" placeholder="+961 03551625"
                            value="{{ old('phone', $data->phone) }}"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                        @error('phone')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- birthday --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.birthday')</label>
                        <input type="date" name="birthday" id=""
                            value="{{ old('birthday', $data->birthday) }}"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                        @error('birthday')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- gender --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.gender')</label>
                        <select name="gender"
                            class="text-black form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                            @if (old('gender', $data->gender))
                                <option value={{ old('gender', $data->gender) }} selected>
                                    {{ old('gender', $data->gender) }}</option>
                            @endif
                            <option value="" style="background:#3672da;color:white">Select a
                                gender
                            </option>
                            <option value="Male">Male</option>
                            <option value="Female"> Female</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- age --}}
                    <div class="flex flex-col">
                        <label for="age" class="pb-1 flex flex-col">@lang('messages.age')</label>
                        <select name="age" id="age"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                            @if (old('age', $data->age))
                                <option value="{{ old('age', $data->age) }}" selected>{{ old('age', $data->age) }}
                                </option>
                            @endif
                            <option value="" style="background:#3672da;color:white">Select Age Range</option>
                            <option value="5-17">Between 5-17</option>
                            <option value="18-30">Between 18-30</option>
                            <option value="30-plus">30+</option>
                        </select>
                        @error('age')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- fav_auth --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.favorite_author')</label>
                        <input type="text" name="fav_author" id="" placeholder="Enter your favorite author"
                            value="{{ old('fav_author', $data->fav_author) }}"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                        @error('fav_author')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- favorite_book_genre --}}
                    <div class="flex flex-col">
                        <label for="favorite_book_genre" class="pb-1 flex flex-col">@lang('messages.favorite_book_genre')</label>
                        <select name="favorite_book_genre" id="favorite_book_genre"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                            @if (old('favorite_book_genre', $data->favorite_book_genre))
                                <option value="{{ old('favorite_book_genre', $data->favorite_book_genre) }}" selected>
                                    {{ old('favorite_book_genre', $data->favorite_book_genre) }}</option>
                            @endif
                            <option value="" style="background:#3672da;color:white">Select a category</option>
                            <option value="Romance">Romance</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Science-Fiction">Science Fiction</option>
                            <option value="Fantasy">Fantasy</option>
                            <option value="Biography">Biography</option>
                            <option value="Self-Help">Self-Help</option>
                            <option value="History">History</option>
                            <option value="Science">Science</option>
                            <option value="Picture-Books">Picture Books</option>
                            <option value="Chapter-Books">Chapter Books</option>
                            <option value="Classic">Classic</option>
                            <option value="Poetry">Poetry</option>
                            <option value="Arabic-Poetry">Arabic Poetry</option>
                            <option value="Love-Poetry">Love Poetry</option>
                        </select>
                        @error('favorite_book_genre')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- worst_book --}}
                    <div class="flex flex-col">
                        <label for="worst_book" class="pb-1 flex flex-col">@lang('messages.worst_book')</label>
                        <input type="text" name="worst_book" id="worst_book" placeholder="Enter your worst book"
                            value="{{ old('worst_book', $data->worst_book) }}"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">

                        @error('worst_book')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- fav_book --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.favorite_book')</label>
                        <input type="text" name="fav_book" id="" placeholder="Enter your favorite book"
                            value="{{ old('fav_book', $data->fav_book) }}"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                        @error('fav_book')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- description --}}
                    <div class="flex flex-col">
                        <label for="" class="pb-1" class="flex flex-col">@lang('messages.description')</label>
                        <textarea type="text" name="description" id="" placeholder="enter a profile Description"
                            class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">{{ old('description', $data->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn">@lang('messages.save')</button>
                    </div>
                </form>
                <form method="POST" action="{{ route('privacy') }}"
                    class="box-1 p-1 rounded col-span-5 sm:col-span-5 lg:col-span-2 md:col-span-5 sm:col-span-1 grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    @csrf
                    @method('post')
                    <div class="col-span-2">
                        <h1 class="text-red-500 pb-5">@lang('messages.check_add_profile')</h1>
                    </div>
                    <div class="flex items-center justify-between col-span-2 p-3">
                        <p>@lang('messages.Language')</p>
                        @if ($data->userPrivacy->show_language)
                            <input class="switch" type="checkbox" checked id="switch_language"
                                name="checkbox_language" /><label for="switch_language" class="label_switch"
                                id="label_switch_language">Toggle</label>
                        @else
                            <input class="switch" type="checkbox" id="switch_language" name="checkbox_language" /><label
                                for="switch_language" class="label_switch" id="label_switch_language">Toggle</label>
                        @endif
                    </div>
                    @error('checkbox_language')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="flex items-center justify-between col-span-2 p-3">
                        <p>@lang('messages.country')</p>

                        @if ($data->userPrivacy->show_country)
                            <input class="switch" type="checkbox" checked id="switch_country"
                                name="checkbox_country" /><label for="switch_country" class="label_switch"
                                id="label_switch_country">Toggle</label>
                    </div>
                @else
                    <input class="switch" type="checkbox" id="switch_country" name="checkbox_country" /><label
                        for="switch_country" class="label_switch" id="label_switch_country">Toggle</label>
            </div>
            @endif
            @error('checkbox_country')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="flex items-center justify-between col-span-2 p-3">
                <p>@lang('messages.city')</p>

                @if ($data->userPrivacy->show_city)
                    <input class="switch" type="checkbox" checked id="switch_city" name="checkbox_city" /><label
                        for="switch_city" class="label_switch" id="label_switch_city">Toggle</label>
            </div>
        @else
            <input class="switch" type="checkbox" id="switch_city" name="checkbox_city" /><label for="switch_city"
                class="label_switch" id="label_switch_city">Toggle</label>
        </div>
        @endif
        @error('checkbox_city')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div class="flex items-center justify-between col-span-2 p-3">
            <p>@lang('messages.phone_number')</p>

            @if ($data->userPrivacy->show_phone)
                <input class="switch" type="checkbox" checked id="switch_phone" name="checkbox_phone" /><label
                    for="switch_phone" class="label_switch" id="label_switch_phone">Toggle</label>
        </div>
    @else
        <input class="switch" type="checkbox" id="switch_phone" name="checkbox_phone" /><label for="switch_phone"
            class="label_switch" id="label_switch_phone">Toggle</label>
    </div>
    @endif
    @error('checkbox_phone')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.birthday')</p>

        @if ($data->userPrivacy->show_birthday)
            <input class="switch" type="checkbox" id="switch_birthday" checked name="checkbox_birthday" /><label
                for="switch_birthday" class="label_switch" id="label_switch_birthday">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_birthday" name="checkbox_birthday" /><label
                for="switch_birthday" class="label_switch" id="label_switch_birthday">Toggle</label>
        @endif
    </div>
    @error('checkbox_birthday')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.gender')</p>

        @if ($data->userPrivacy->show_gender)
            <input class="switch" type="checkbox" checked id="switch_gender" name="checkbox_gender" /><label
                for="switch_gender" class="label_switch" id="label_switch_gender">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_gender" name="checkbox_gender" /><label
                for="switch_gender" class="label_switch" id="label_switch_gender">Toggle</label>
        @endif
    </div>
    @error('checkbox_gender')
        <p class="text-red-500">{{ $message }}</p>
    @enderror

    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.favorite_author')</p>

        @if ($data->userPrivacy->show_fav_auth)
            <input class="switch" type="checkbox" checked id="switch_fav_author" name="checkbox_fav_auth" /><label
                for="switch_fav_author" class="label_switch" id="label_switch_fav_author">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_fav_author" name="checkbox_fav_auth" /><label
                for="switch_fav_author" class="label_switch" id="label_switch_fav_author">Toggle</label>
        @endif
    </div>
    @error('checkbox_fav_auth')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.favorite_book_genre')</p>

        @if ($data->userPrivacy->show_favorite_book_genre)
            <input class="switch" type="checkbox" id="switch_favorite_book_genre" checked
                name="checkbox_favorite_book_genre" /><label for="switch_favorite_book_genre" class="label_switch"
                id="label_switch_favorite_book_genre">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_favorite_book_genre"
                name="checkbox_favorite_book_genre" /><label for="switch_favorite_book_genre" class="label_switch"
                id="label_switch_favorite_book_genre">Toggle</label>
        @endif
    </div>
    @error('checkbox_favorite_book_genre')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.worst_book')</p>

        @if ($data->userPrivacy->show_worst_book)
            <input class="switch" type="checkbox" checked id="switch_worst_book" name="checkbox_worst_book" /><label
                for="switch_worst_book" class="label_switch" id="label_switch_worst_book">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_worst_book" name="checkbox_worst_book" /><label
                for="switch_worst_book" class="label_switch" id="label_switch_worst_book">Toggle</label>
        @endif
    </div>
    @error('checkbox_worst_book')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.favorite_book')</p>

        @if ($data->userPrivacy->show_fav_book)
            <input class="switch" type="checkbox" checked id="switch_fav_book" name="checkbox_fav_book" /><label
                for="switch_fav_book" class="label_switch" id="label_switch_fav_book">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_fav_book" name="checkbox_fav_book" /><label
                for="switch_fav_book" class="label_switch" id="label_switch_fav_book">Toggle</label>
        @endif
    </div>
    @error('checkbox_fav_book')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between col-span-2 p-3">
        <p>@lang('messages.description')</p>
        @if ($data->userPrivacy->show_description)
            <input class="switch" type="checkbox" id="switch_description" checked name="checkbox_description" /><label
                for="switch_description" class="label_switch" id="label_switch_description">Toggle</label>
        @else
            <input class="switch" type="checkbox" id="switch_description" name="checkbox_description" /><label
                for="switch_description" class="label_switch" id="label_switch_description">Toggle</label>
        @endif
    </div>
    @error('checkbox_description')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
    <button class="btn" style="width: 80px">@lang('messages.save')</button>
    </form>



    <div class="box-1 col-span-5 md:col-span-5">
        <h1 class="p-5 text-xl">@lang('messages.change_password')</h1>
        <form action="{{ route('change_password') }}" id="changePasswordForm" method="POST"
            class="rounded col-span-5 sm:col-span-5 lg:col-span-5 md:grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-5 p-5">
            @csrf
            @method('post')
            <div class="flex flex-col col-span-2">
                <label for="old_password" class="pb-1 flex flex-col">@lang('messages.old_password')</label>
                <input type="password" name="old_password" id="old_password" placeholder="********"
                    class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                @error('old_password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                @if (session()->has('old_password'))
                    @if (session('old_password') == 'old_password')
                        <p class="text-red-500">@lang('messages.old_password')</p>
                    @endif
                @endif
            </div>
            <div class="flex flex-col col-span-1">
                <label for="new_password" class="pb-1 flex flex-col">@lang('messages.new_password')</label>
                <input type="password" name="new_password" id="new_password" placeholder="********"
                    class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                @error('new_password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col col-span-1">
                <label for="confirm_password" class="pb-1 flex flex-col">@lang('messages.confirm_password')</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="********"
                    class="form-select form-control block w-full px-4 py-3 pr-8 leading-tight bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring focus:border-blue-500">
                @error('confirm_password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                @if (session()->has('failed_change_password'))
                    @if (session('failed_change_password') == 'failed_change_password')
                        <p class="text-red-500">@lang('messages.password_not_match')</p>
                    @endif
                @endif
            </div>
            <button type="submit" class="btn lg:w-2/5 md:w-2/5 sm:w-2/5 w-4/5">@lang('messages.change_password')</button>
        </form>

    </div>
    </div>
    </div>
    </div>

    <script src="{{ asset('js/Settings/Settings.js') }}"></script>
@endsection
