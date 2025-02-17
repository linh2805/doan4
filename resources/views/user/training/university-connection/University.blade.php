@extends('user.index')
@section('name')
@include('user.home.header')

<div class="container">
		<section class="header-section">
			<div class="centered">
				<h1 class="fw-bold scale">Chương Trình Liên Thông Đại Học Mầm Non</h1>
				<p class="text scale">Nâng bước ước mơ, phát triển sự nghiệp giáo dục mầm non.</p>
			</div>
		</section>

		<!-- Giới Thiệu -->
		<div class="row align-items-stretch mb-5">
			<div class="col-lg-6 p-0">
				<img src="./images/intro.png" alt="Giới thiệu" class="img-fluid"
					style="width: 100%; height: 100%; object-fit: cover;">
			</div>
			<div class="col-lg-6 d-flex flex-column justify-content-center" style="height: 100%;">
				<h2 class="fw-bold">Giới Thiệu Chương Trình</h2>
				<p>Chương trình Liên Thông Đại Học Mầm Non là một khóa học dành cho những người đã có bằng cao đẳng hoặc
					trung cấp chuyên ngành giáo dục mầm non, nhằm nâng cao trình độ chuyên môn và kiến thức về giáo dục
					trẻ nhỏ. Chương trình không chỉ cung cấp các kiến thức lý thuyết vững chắc mà còn tập trung vào thực
					hành, giúp sinh viên phát triển kỹ năng giảng dạy và quản lý lớp học hiệu quả. Qua đó, chương trình
					góp phần nâng cao chất lượng giáo dục mầm non, đáp ứng nhu cầu ngày càng cao của xã hội trong việc
					chăm sóc và giáo dục trẻ em.</p>
				<ul class="list-group">
					<li class="list-group-item">⏳ Thời gian: 2 năm (4 học kỳ)</li>
					<li class="list-group-item">🎓 Bằng cấp: Cử nhân Sư phạm Mầm non</li>
					<li class="list-group-item">📍 Địa điểm: Trường Đại học Giáo dục</li>
				</ul>
			</div>
		</div>

		<!-- Mục Tiêu & Đối Tượng -->
		<div class="mb-5 animate-section">
			<section class="p-4 bg-light rounded shadow">
				<ul class="mb-4">
					<li><strong>Kiến thức chuyên sâu:</strong> Cung cấp nền tảng lý thuyết và thực hành vững chắc về
						giáo dục mầm non.</li>
					<li><strong>Kỹ năng sư phạm:</strong> Rèn luyện kỹ năng giảng dạy, quản lý lớp học và tổ chức các
						hoạt động giáo dục.</li>
					<li><strong>Phát triển năng lực:</strong> Bồi dưỡng khả năng nghiên cứu, sáng tạo và ứng dụng công
						nghệ trong giảng dạy.</li>
					<li><strong>Đạo đức nghề nghiệp:</strong> Xây dựng phẩm chất đạo đức, tinh thần trách nhiệm và lòng
						yêu nghề.</li>
				</ul>

				<h4 class="text-info">Đối Tượng Đào Tạo:</h4>
				<ul>
					<li>Giáo viên mầm non đã tốt nghiệp trung cấp hoặc cao đẳng sư phạm mầm non.</li>
					<li>Sinh viên tốt nghiệp trung cấp, cao đẳng thuộc nhóm ngành giáo dục muốn chuyển đổi ngành học.
					</li>
					<li>Người đang làm việc trong lĩnh vực giáo dục mầm non muốn nâng cao trình độ chuyên môn.</li>
				</ul>
			</section>

		</div>

		<!-- Nội Dung Chương Trình -->
		<section class="mb-5 animate-section">
			<h2 class="fw-bold text-center">Nội Dung Chương Trình Học</h2>
			<ul>
				<li>💡 Tâm lý trẻ em và phát triển lứa tuổi</li>
				<li>📚 Phương pháp giảng dạy và thiết kế bài giảng</li>
				<li>🎨 Kỹ năng tổ chức hoạt động vui chơi, sáng tạo</li>
				<li>📝 Thực tập sư phạm tại các trường mầm non</li>
			</ul>
		</section>

		<!-- Cơ Hội Nghề Nghiệp -->
		<div class="p-4 bg-light rounded shadow mb-5 animate-section">
			<h2 class="text-center fw-bold">Cơ Hội Nghề Nghiệp</h2>
			<p>✔️ Giảng dạy tại các trường mầm non công lập, tư thục và quốc tế.</p>
			<p>✔️ Tham gia vào đội ngũ quản lý giáo dục mầm non hoặc trở thành chuyên viên đào tạo giáo viên.</p>
			<p>✔️Quản lý cơ sở giáo dục mầm non: Làm hiệu trưởng, phó hiệu trưởng hoặc quản lý chuyên môn.</p>
			<p>✔️Cố vấn giáo dục sớm: Tư vấn cho phụ huynh về phương pháp giáo dục trẻ nhỏ.</p>
			<p>✔️Nghiên cứu viên giáo dục mầm non: Làm việc tại các viện nghiên cứu hoặc dự án phát triển giáo dục.</p>
		</div>

		<div class="testimonials animate-section">
			<h2 class="fw-bold text-center">Những Lời Chứng Thực</h2>

			<!-- Danh sách lời chứng thực -->
			<div class="testimonial-slider">
				<div class="testimonial-item active">
					<div class="testimonial-content">
						<img src="./images/Ellipse 1.png" alt="Nguyễn Văn A" class="rounded-circle">
						<h5>Nguyễn Văn A</h5>
						<p>“Chương trình rất bổ ích và giúp tôi tự tin hơn trong việc giảng dạy!”</p>
					</div>
				</div>

				<div class="testimonial-item">
					<div class="testimonial-content">
						<img src="./images/Ellipse 2.png" alt="Trần Thị B" class="rounded-circle">
						<h5>Trần Thị B</h5>
						<p>“Đội ngũ giảng viên rất nhiệt tình và chuyên nghiệp!”</p>
					</div>
				</div>

				<div class="testimonial-item">
					<div class="testimonial-content">
						<img src="./images/Ellipse 3.png" alt="Lê Văn C" class="rounded-circle">
						<h5>Lê Văn C</h5>
						<p>“Chương trình đã giúp tôi tìm ra niềm đam mê thực sự của mình.”</p>
					</div>
				</div>

				<!-- Thêm nhiều lời chứng thực khác nếu cần -->
			</div>

			<!-- Nút điều hướng -->
			<div class="pagination">
				<span class="dot active" onclick="currentTestimonial(1)"></span>
				<span class="dot" onclick="currentTestimonial(2)"></span>
				<span class="dot" onclick="currentTestimonial(3)"></span>
				<!-- Thêm nhiều nút nếu có -->
			</div>
		</div>

		<!-- FAQ -->
		<div class="faq animate-section">
			<h2 class="fw-bold text-center">Câu Hỏi Thường Gặp</h2>
			<div class="accordion" id="faqAccordion">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
								aria-expanded="true" aria-controls="collapseOne">
								Câu Hỏi 1 : Hồ sơ tuyển sinh Cao đẳng mầm non như thế nào?
							</button>
						</h2>
					</div>
					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
						data-parent="#faqAccordion">
						<div class="card-body">
							<h2>Ngành Giáo dục Mầm non</h2>
							<p>Ngành giáo dục mầm non ngày càng thu hút nhiều học sinh, đặc biệt là các bạn nữ yêu thích
								nghề sư phạm. Trường Cao đẳng Sư phạm Trung Ương là lựa chọn chất lượng và đáng tin cậy
								để theo đuổi chuyên ngành này.</p>

							<h3>Điều kiện nộp hồ sơ xét tuyển Cao đẳng Mầm non</h3>
							<p>Trước đây, thí sinh cần tham dự kỳ thi THPT Quốc gia để nộp hồ sơ xét tuyển. Hiện tại,
								trường chấp nhận xét tuyển bằng học bạ THPT.</p>

							<h3>Hồ sơ tuyển sinh Cao đẳng Mầm non</h3>
							<ul>
								<li>01 bản photo công chứng học bạ THPT.</li>
								<li>01 bản photo công chứng giấy chứng nhận tốt nghiệp tạm thời hoặc bằng tốt nghiệp.
								</li>
								<li>02 ảnh 3x4 (ghi rõ họ tên, ngày sinh phía sau ảnh).</li>
								<li>02 phong bì (ghi rõ họ tên, địa chỉ người nhận để nhận giấy báo nhập học).</li>
								<li>Giấy tờ ưu tiên (nếu có).</li>
							</ul>

							<h3>Cách thức nộp hồ sơ</h3>
							<p><strong>Cách 1:</strong> Nộp hồ sơ trực tiếp hoặc gửi qua đường bưu điện đến:</p>
							<p><em>Cơ sở đào tạo Trường Cao đẳng Sư phạm Trung Ương</em></p>
							<p><em>Địa chỉ: Số 212 Hoàng Quốc Việt, Cầu Giấy, Hà Nội</em></p>

							<p><strong>Cách 2:</strong> Đăng ký trực tuyến qua đường link sau: <a href="#">[Link đăng
									ký]</a></p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
								data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Câu Hỏi 2 : Điểm Chuẩn Ngành Sư Phạm Những Năm Gần Đây
							</button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
						<div class="card-body">
							<h2>Điểm chuẩn ngành Sư phạm Mầm non</h2>

							<h3>1. Trường Đại học Sư phạm Hà Nội (Mã: SPH)</h3>
							<table>
								<caption>Hệ Đại học</caption>
								<tr>
									<th>Năm</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>2014</td>
									<td>21.5</td>
								</tr>
								<tr>
									<td>2015</td>
									<td>22</td>
								</tr>
								<tr>
									<td>2016</td>
									<td>21.25</td>
								</tr>
								<tr>
									<td>2017</td>
									<td>22.25</td>
								</tr>
								<tr>
									<td>2018</td>
									<td>21.15</td>
								</tr>
							</table>

							<h3>2. Trường Đại học Thủ đô (Mã: HNM)</h3>
							<table>
								<caption>Hệ Đại học</caption>
								<tr>
									<th>Năm</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>2012</td>
									<td>22</td>
								</tr>
								<tr>
									<td>2013</td>
									<td>23</td>
								</tr>
								<tr>
									<td>2014</td>
									<td>26</td>
								</tr>
								<tr>
									<td>2015</td>
									<td>20</td>
								</tr>
								<tr>
									<td>2016</td>
									<td>25</td>
								</tr>
								<tr>
									<td>2017</td>
									<td>36.75</td>
								</tr>
								<tr>
									<td>2018</td>
									<td>37.58</td>
								</tr>
							</table>
							<table>
								<caption>Hệ Cao đẳng</caption>
								<tr>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>29.52</td>
								</tr>
							</table>

							<h3>3. Cao đẳng Sư phạm Trung ương (Mã: CM1)</h3>
							<table>
								<caption>Hệ Cao đẳng</caption>
								<tr>
									<th>Năm</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>2014</td>
									<td>22</td>
								</tr>
								<tr>
									<td>2015</td>
									<td>20.75</td>
								</tr>
								<tr>
									<td>Hệ nhu cầu xã hội</td>
									<td>14</td>
								</tr>
							</table>

							<h4>Năm 2016 - Giáo dục Mầm non</h4>
							<table>
								<caption>Xét bằng điểm thi THPT Quốc gia</caption>
								<tr>
									<th>Hệ</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>Chất lượng cao</td>
									<td>21</td>
								</tr>
								<tr>
									<td>Nhu cầu xã hội</td>
									<td>15</td>
								</tr>
							</table>
							<table>
								<caption>Xét bằng học bạ THPT</caption>
								<tr>
									<th>Hệ</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>Chất lượng cao</td>
									<td>23</td>
								</tr>
								<tr>
									<td>Nhu cầu xã hội</td>
									<td>21</td>
								</tr>
							</table>

							<h4>Năm 2017</h4>
							<p>Trường chấp nhận kết quả thi năng khiếu khối M từ các trường đại học công lập trên cả
								nước.</p>

							<h4>Năm 2018 - Giáo dục Mầm non</h4>
							<table>
								<caption>Xét bằng điểm thi THPT Quốc gia</caption>
								<tr>
									<th>Hệ</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>Chất lượng cao</td>
									<td>19</td>
								</tr>
								<tr>
									<td>Nhu cầu xã hội</td>
									<td>18.25</td>
								</tr>
							</table>
							<table>
								<caption>Xét bằng học bạ THPT</caption>
								<tr>
									<th>Hệ</th>
									<th>Điểm</th>
								</tr>
								<tr>
									<td>Nhu cầu xã hội</td>
									<td>19.5</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Contact Form -->
		<div class="contact-form">
			<h3 class="title">Liên Hệ để được tư vấn</h3>
			<form id="registrationForm">

				<div class="form-group">
					<input type="text" name="hoten" class="form-control" placeholder="Họ và tên" required>
				</div>

				<div class="form-group">
					<input type="tel" name="sodienthoai" class="form-control" placeholder="Số điện thoại" required>
				</div>

				<div class="form-group">
					<input type="email" name="diachiemail" class="form-control" placeholder="Email" required>
				</div>

				<div class="form-group">
					<textarea class="form-control" id="message" rows="4" placeholder="Message" required></textarea>
				</div>

				<button type="submit" class="btn btn-primary btn-block" style="animation: pulse 2s infinite ease-in-out;">Gửi yêu cầu</button>

			</form>
		</div>

	</div>
    <script>
		document.addEventListener("scroll", function () {
			document.querySelectorAll(".animate-section").forEach(el => {
				if (el.getBoundingClientRect().top < window.innerHeight - 100) {
					el.classList.add("appear");
				}
			});
		});

		window.onscroll = function () {
			const button = document.getElementById("backToTop");
			if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
				button.style.display = "block";
			} else {
				button.style.display = "none";
			}
		};

		document.getElementById("backToTop").onclick = function () {
			document.body.scrollTop = 0; // For Safari
			document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
		};
	</script>

@include('user.home.footer')