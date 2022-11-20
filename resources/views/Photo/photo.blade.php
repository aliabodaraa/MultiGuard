        <form id="regForm" method="POST" action="{{ route("store") }}"
         enctype="multipart/form-data"
         >
            @csrf
                Country of Residency :
                <input
                type="file"
                name="lecture"
                id="img2"
                class="form-control @error('lecture') is-invalid @enderror" required>
                <input
                type="file"
                name="personal_picture"
                id="img2"
                class="form-control @error('personal_picture') is-invalid @enderror" required>
                </p>
                <button type="submit">Submit</button>

            </form>