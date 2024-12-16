<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<div style="background-color: #000; color: white; padding: 40px 20px; font-family: Arial, sans-serif; font-size: 12px;">
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap; max-width: 1200px; margin: 0 auto;">
        <!-- Our Categories -->
        @php
        $categories = \App\Models\Category::all();
      @endphp
        <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="padding-bottom: 10px; margin-bottom: 20px; font-size: 16px;">OUR CATEGORIES</h3>
            <ul style="padding-left: 0; list-style-type: none;">
                @foreach($categories as $category)
                    <li style=" list-style: none; padding: 0; line-height: 1.6;">
                        <a class="hvr-forward col" href="{{ route('category.show', $category->category_id) }}"
                            style="color: inherit; text-decoration: none;">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Our Story -->
        <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="padding-bottom: 10px; margin-bottom: 20px; font-size: 16px;">OUR STORY</h3>
            <ul style="list-style: none; padding: 0; line-height: 1.6;">
                <li><a href="{{ url('/') }}" style="color: white; text-decoration: none;">Home</a></li>
                <li><a href="{{ url('/About') }}" style="color: white; text-decoration: none;">About Us</a></li>
                <li><a href="{{ url('/Contact') }}" style="color: white; text-decoration: none;">Contact Us</a></li>
            </ul>
        </div>
        <!-- Registered Address -->
        <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="padding-bottom: 10px; margin-bottom: 20px; font-size: 16px;">ADDRESS</h3>
            <p style="line-height: 1.6; font-size: 12px;">
                Innobrain Deals<br>
                313, 3rd Floor, Bakrol Square,<br>
                Bakrol Rd, V.V.Nagar-388120,<br>
                Dist. Anand, Gujarat<br>
                {{-- Contact us:<br>
                +91-9998202023<br>
                +91-7990523663<br>
                Email: inquiry@innobraintechnologies.in --}}
            </p>
        </div>
        <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">

                <h3 style="padding-bottom: 10px; margin-bottom: 20px; font-size: 16px;">CONTACT US</h3>
                <h5>
                    <a class="hvr-forward col" style="color: white; text-decoration: none;">+91-9998202023</a>
                </h5>

                <h5>
                    <a class="hvr-forward col" style="color: white; text-decoration: none;">+91-7990523663</a>
                </h5>
                <h5>
                    <a class="hvr-forward col" style="color: white; text-decoration: none;" >Email: inquiry@innobraintechnologies.in</a>
                </h5>

            </div>
        </div>
        <!-- Social Links -->
        {{-- <div style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="padding-bottom: 10px; margin-bottom: 20px; font-size: 16px;">SOCIAL LINKS</h3>
            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="#" style="color: white; font-size: 18px; text-decoration: none;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" style="color: white; font-size: 18px; text-decoration: none;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" style="color: white; font-size: 18px; text-decoration: none;">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
            </div>
        </div>
    </div> --}}
    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
        © 2024 Developed By InnoBrain Technologies
    </div>
</div>
