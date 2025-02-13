!function() {
    "use strict";
    var e = function(e) {
        return Math.abs(parseInt(e, 10))
    };
    const t = (e, t) => {
        const n = new Map([["init", "init"], ["validation_failed", "invalid"], ["acceptance_missing", "unaccepted"], ["spam", "spam"], ["aborted", "aborted"], ["mail_sent", "sent"], ["mail_failed", "failed"], ["submitting", "submitting"], ["resetting", "resetting"], ["payment_required", "payment-required"]]);
        n.has(t) && (t = n.get(t)),
        Array.from(n.values()).includes(t) || (t = `custom-${t = (t = t.replace(/[^0-9a-z]+/i, " ").trim()).replace(/\s+/, "-")}`);
        const r = e.getAttribute("data-status");
        return e.wpcf7.status = t,
        e.setAttribute("data-status", t),
        e.classList.add(t),
        r && r !== t && e.classList.remove(r),
        t
    }
    ;
    var n = function(e, t, n) {
        var r = new CustomEvent("wpcf7".concat(t),{
            bubbles: !0,
            detail: n
        });
        "string" == typeof e && (e = document.querySelector(e)),
        e.dispatchEvent(r)
    };
    function r(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n,
        e
    }
    function a(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }
            ))),
            n.push.apply(n, r)
        }
        return n
    }
    function c(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? a(Object(n), !0).forEach((function(t) {
                r(e, t, n[t])
            }
            )) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : a(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }
            ))
        }
        return e
    }
    var o = function(e) {
        var t = wpcf7.api
          , n = t.root
          , r = t.namespace
          , a = void 0 === r ? "contact-form-7/v1" : r;
        return i.reduceRight((function(e, t) {
            return function(n) {
                return t(n, e)
            }
        }
        ), (function(e) {
            var t, r, o = e.url, i = e.path, s = e.endpoint, u = e.headers, l = e.body, f = e.data, p = function(e, t) {
                if (null == e)
                    return {};
                var n, r, a = function(e, t) {
                    if (null == e)
                        return {};
                    var n, r, a = {}, c = Object.keys(e);
                    for (r = 0; r < c.length; r++)
                        n = c[r],
                        t.indexOf(n) >= 0 || (a[n] = e[n]);
                    return a
                }(e, t);
                if (Object.getOwnPropertySymbols) {
                    var c = Object.getOwnPropertySymbols(e);
                    for (r = 0; r < c.length; r++)
                        n = c[r],
                        t.indexOf(n) >= 0 || Object.prototype.propertyIsEnumerable.call(e, n) && (a[n] = e[n])
                }
                return a
            }(e, ["url", "path", "endpoint", "headers", "body", "data"]);
            "string" == typeof s && (t = a.replace(/^\/|\/$/g, ""),
            i = (r = s.replace(/^\//, "")) ? t + "/" + r : t),
            "string" == typeof i && (-1 !== n.indexOf("?") && (i = i.replace("?", "&")),
            i = i.replace(/^\//, ""),
            o = n + i),
            delete (u = c({
                Accept: "application/json, */*;q=0.1"
            }, u))["X-WP-Nonce"],
            f && (l = JSON.stringify(f),
            u["Content-Type"] = "application/json");
            var d = {
                code: "fetch_error",
                message: "You are probably offline."
            }
              , w = {
                code: "invalid_json",
                message: "The response is not a valid JSON response."
            };
            return window.fetch(o || i || window.location.href, c(c({}, p), {}, {
                headers: u,
                body: l
            })).then((function(e) {
                return Promise.resolve(e).then((function(e) {
                    if (e.status >= 200 && e.status < 300)
                        return e;
                    throw e
                }
                )).then((function(e) {
                    if (204 === e.status)
                        return null;
                    if (e && e.json)
                        return e.json().catch((function() {
                            throw w
                        }
                        ));
                    throw w
                }
                ))
            }
            ), (function() {
                throw d
            }
            ))
        }
        ))(e)
    }
      , i = [];
    function s(e, r={}) {
        if (wpcf7.blocked)
            return u(e),
            void t(e, "submitting");
        const a = new FormData(e);
        r.submitter && r.submitter.name && a.append(r.submitter.name, r.submitter.value);
        const c = {
            contactFormId: e.wpcf7.id,
            pluginVersion: e.wpcf7.pluginVersion,
            contactFormLocale: e.wpcf7.locale,
            unitTag: e.wpcf7.unitTag,
            containerPostId: e.wpcf7.containerPost,
            status: e.wpcf7.status,
            inputs: Array.from(a, (e => {
                const t = e[0]
                  , n = e[1];
                return !t.match(/^_/) && {
                    name: t,
                    value: n
                }
            }
            )).filter((e => !1 !== e)),
            formData: a
        }
          , i = t => {
            const n = document.createElement("li");
            n.setAttribute("id", t.error_id),
            t.idref ? n.insertAdjacentHTML("beforeend", `<a href="#${t.idref}">${t.message}</a>`) : n.insertAdjacentText("beforeend", t.message),
            e.wpcf7.parent.querySelector(".screen-reader-response ul").appendChild(n)
        }
          , s = t => {
            const n = e.querySelector(t.into)
              , r = n.querySelector(".wpcf7-form-control");
            r.classList.add("wpcf7-not-valid"),
            r.setAttribute("aria-describedby", t.error_id);
            const a = document.createElement("span");
            a.setAttribute("class", "wpcf7-not-valid-tip"),
            a.setAttribute("aria-hidden", "true"),
            a.insertAdjacentText("beforeend", t.message),
            n.appendChild(a),
            n.querySelectorAll("[aria-invalid]").forEach((e => {
                e.setAttribute("aria-invalid", "true")
            }
            )),
            r.closest(".use-floating-validation-tip") && (r.addEventListener("focus", (e => {
                a.setAttribute("style", "display: none")
            }
            )),
            a.addEventListener("mouseover", (e => {
                a.setAttribute("style", "display: none")
            }
            )))
        }
        ;
        o({
            endpoint: `contact-forms/${e.wpcf7.id}/feedback`,
            method: "POST",
            body: a,
            wpcf7: {
                endpoint: "feedback",
                form: e,
                detail: c
            }
        }).then((r => {
            const a = t(e, r.status);
            return c.status = r.status,
            c.apiResponse = r,
            ["invalid", "unaccepted", "spam", "aborted"].includes(a) ? n(e, a, c) : ["sent", "failed"].includes(a) && n(e, `mail${a}`, c),
            n(e, "submit", c),
            r
        }
        )).then((t => {
            t.posted_data_hash && (e.querySelector('input[name="_wpcf7_posted_data_hash"]').value = t.posted_data_hash),
            "mail_sent" === t.status && (e.reset(),
            e.wpcf7.resetOnMailSent = !0),
            t.invalid_fields && (t.invalid_fields.forEach(i),
            t.invalid_fields.forEach(s)),
            e.wpcf7.parent.querySelector('.screen-reader-response [role="status"]').insertAdjacentText("beforeend", t.message),
            e.querySelectorAll(".wpcf7-response-output").forEach((e => {
                e.innerText = t.message
            }
            ))
        }
        )).catch((e => console.error(e)))
    }
    o.use = function(e) {
        i.unshift(e)
    }
    ,
    o.use(( (e, r) => {
        if (e.wpcf7 && "feedback" === e.wpcf7.endpoint) {
            const {form: r, detail: a} = e.wpcf7;
            u(r),
            n(r, "beforesubmit", a),
            t(r, "submitting")
        }
        return r(e)
    }
    ));
    const u = e => {
        e.wpcf7.parent.querySelector('.screen-reader-response [role="status"]').innerText = "",
        e.wpcf7.parent.querySelector(".screen-reader-response ul").innerText = "",
        e.querySelectorAll(".wpcf7-not-valid-tip").forEach((e => {
            e.remove()
        }
        )),
        e.querySelectorAll("[aria-invalid]").forEach((e => {
            e.setAttribute("aria-invalid", "false")
        }
        )),
        e.querySelectorAll(".wpcf7-form-control").forEach((e => {
            e.removeAttribute("aria-describedby"),
            e.classList.remove("wpcf7-not-valid")
        }
        )),
        e.querySelectorAll(".wpcf7-response-output").forEach((e => {
            e.innerText = ""
        }
        ))
    }
    ;
    function l(e) {
        var r = new FormData(e)
          , a = {
            contactFormId: e.wpcf7.id,
            pluginVersion: e.wpcf7.pluginVersion,
            contactFormLocale: e.wpcf7.locale,
            unitTag: e.wpcf7.unitTag,
            containerPostId: e.wpcf7.containerPost,
            status: e.wpcf7.status,
            inputs: Array.from(r, (function(e) {
                var t = e[0]
                  , n = e[1];
                return !t.match(/^_/) && {
                    name: t,
                    value: n
                }
            }
            )).filter((function(e) {
                return !1 !== e
            }
            )),
            formData: r
        };
        o({
            endpoint: "contact-forms/".concat(e.wpcf7.id, "/refill"),
            method: "GET",
            wpcf7: {
                endpoint: "refill",
                form: e,
                detail: a
            }
        }).then((function(r) {
            e.wpcf7.resetOnMailSent ? (delete e.wpcf7.resetOnMailSent,
            t(e, "mail_sent")) : t(e, "init"),
            a.apiResponse = r,
            n(e, "reset", a)
        }
        )).catch((function(e) {
            return console.error(e)
        }
        ))
    }
    o.use((function(e, n) {
        if (e.wpcf7 && "refill" === e.wpcf7.endpoint) {
            var r = e.wpcf7
              , a = r.form;
            r.detail,
            u(a),
            t(a, "resetting")
        }
        return n(e)
    }
    ));
    var f = function(e, t) {
        var n = function(n) {
            var r = t[n];
            e.querySelectorAll('input[name="'.concat(n, '"]')).forEach((function(e) {
                e.value = ""
            }
            )),
            e.querySelectorAll("img.wpcf7-captcha-".concat(n)).forEach((function(e) {
                e.setAttribute("src", r)
            }
            ));
            var a = /([0-9]+)\.(png|gif|jpeg)$/.exec(r);
            a && e.querySelectorAll('input[name="_wpcf7_captcha_challenge_'.concat(n, '"]')).forEach((function(e) {
                e.value = a[1]
            }
            ))
        };
        for (var r in t)
            n(r)
    }
      , p = function(e, t) {
        var n = function(n) {
            var r = t[n][0]
              , a = t[n][1];
            e.querySelectorAll(".wpcf7-form-control-wrap.".concat(n)).forEach((function(e) {
                e.querySelector('input[name="'.concat(n, '"]')).value = "",
                e.querySelector(".wpcf7-quiz-label").textContent = r,
                e.querySelector('input[name="_wpcf7_quiz_answer_'.concat(n, '"]')).value = a
            }
            ))
        };
        for (var r in t)
            n(r)
    };
    function d(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }
            ))),
            n.push.apply(n, r)
        }
        return n
    }
    function w(t) {
        const n = new FormData(t);
        t.wpcf7 = {
            id: e(n.get("_wpcf7")),
            status: t.getAttribute("data-status"),
            pluginVersion: n.get("_wpcf7_version"),
            locale: n.get("_wpcf7_locale"),
            unitTag: n.get("_wpcf7_unit_tag"),
            containerPost: e(n.get("_wpcf7_container_post")),
            parent: t.closest(".wpcf7")
        },
        t.querySelectorAll(".has-spinner").forEach((e => {
            e.insertAdjacentHTML("afterend", '<span class="wpcf7-spinner"></span>')
        }
        )),
        function(e) {
            e.querySelectorAll(".wpcf7-exclusive-checkbox").forEach((function(t) {
                t.addEventListener("change", (function(t) {
                    var n = t.target.getAttribute("name");
                    e.querySelectorAll('input[type="checkbox"][name="'.concat(n, '"]')).forEach((function(e) {
                        e !== t.target && (e.checked = !1)
                    }
                    ))
                }
                ))
            }
            ))
        }(t),
        function(e) {
            e.querySelectorAll(".has-free-text").forEach((function(t) {
                var n = t.querySelector("input.wpcf7-free-text")
                  , r = t.querySelector('input[type="checkbox"], input[type="radio"]');
                n.disabled = !r.checked,
                e.addEventListener("change", (function(e) {
                    n.disabled = !r.checked,
                    e.target === r && r.checked && n.focus()
                }
                ))
            }
            ))
        }(t),
        function(e) {
            e.querySelectorAll(".wpcf7-validates-as-url").forEach((function(e) {
                e.addEventListener("change", (function(t) {
                    var n = e.value.trim();
                    n && !n.match(/^[a-z][a-z0-9.+-]*:/i) && -1 !== n.indexOf(".") && (n = "http://" + (n = n.replace(/^\/+/, ""))),
                    e.value = n
                }
                ))
            }
            ))
        }(t),
        function(e) {
            if (e.querySelector(".wpcf7-acceptance") && !e.classList.contains("wpcf7-acceptance-as-validation")) {
                var t = function() {
                    var t = !0;
                    e.querySelectorAll(".wpcf7-acceptance").forEach((function(e) {
                        if (t && !e.classList.contains("optional")) {
                            var n = e.querySelector('input[type="checkbox"]');
                            (e.classList.contains("invert") && n.checked || !e.classList.contains("invert") && !n.checked) && (t = !1)
                        }
                    }
                    )),
                    e.querySelectorAll(".wpcf7-submit").forEach((function(e) {
                        e.disabled = !t
                    }
                    ))
                };
                t(),
                e.addEventListener("change", (function(e) {
                    t()
                }
                )),
                e.addEventListener("wpcf7reset", (function(e) {
                    t()
                }
                ))
            }
        }(t),
        function(t) {
            var n = function(t, n) {
                var r = e(t.getAttribute("data-starting-value"))
                  , a = e(t.getAttribute("data-maximum-value"))
                  , c = e(t.getAttribute("data-minimum-value"))
                  , o = t.classList.contains("down") ? r - n.value.length : n.value.length;
                t.setAttribute("data-current-value", o),
                t.innerText = o,
                a && a < n.value.length ? t.classList.add("too-long") : t.classList.remove("too-long"),
                c && n.value.length < c ? t.classList.add("too-short") : t.classList.remove("too-short")
            }
              , a = function(e) {
                e = function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var n = null != arguments[t] ? arguments[t] : {};
                        t % 2 ? d(Object(n), !0).forEach((function(t) {
                            r(e, t, n[t])
                        }
                        )) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : d(Object(n)).forEach((function(t) {
                            Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
                        }
                        ))
                    }
                    return e
                }({
                    init: !1
                }, e),
                t.querySelectorAll(".wpcf7-character-count").forEach((function(r) {
                    var a = r.getAttribute("data-target-name")
                      , c = t.querySelector('[name="'.concat(a, '"]'));
                    c && (c.value = c.defaultValue,
                    n(r, c),
                    e.init && c.addEventListener("keyup", (function(e) {
                        n(r, c)
                    }
                    )))
                }
                ))
            };
            a({
                init: !0
            }),
            t.addEventListener("wpcf7reset", (function(e) {
                a()
            }
            ))
        }(t),
        window.addEventListener("load", (e => {
            wpcf7.cached && t.reset()
        }
        )),
        t.addEventListener("reset", (e => {
            wpcf7.reset(t)
        }
        )),
        t.addEventListener("submit", (e => {
            const n = e.submitter;
            wpcf7.submit(t, {
                submitter: n
            }),
            e.preventDefault()
        }
        )),
        t.addEventListener("wpcf7submit", (e => {
            e.detail.apiResponse.captcha && f(t, e.detail.apiResponse.captcha),
            e.detail.apiResponse.quiz && p(t, e.detail.apiResponse.quiz)
        }
        )),
        t.addEventListener("wpcf7reset", (e => {
            e.detail.apiResponse.captcha && f(t, e.detail.apiResponse.captcha),
            e.detail.apiResponse.quiz && p(t, e.detail.apiResponse.quiz)
        }
        ))
    }
    document.addEventListener("DOMContentLoaded", (e => {
        var t;
        if ("undefined" == typeof wpcf7)
            return void console.error("wpcf7 is not defined.");
        if (void 0 === wpcf7.api)
            return void console.error("wpcf7.api is not defined.");
        if ("function" != typeof window.fetch)
            return void console.error("Your browser doesn't support window.fetch().");
        if ("function" != typeof window.FormData)
            return void console.error("Your browser doesn't support window.FormData().");
        const n = document.querySelectorAll(".wpcf7 > form");
        "function" == typeof n.forEach ? (wpcf7 = {
            init: w,
            submit: s,
            reset: l,
            ...null !== (t = wpcf7) && void 0 !== t ? t : {}
        },
        n.forEach((e => wpcf7.init(e)))) : console.error("Your browser doesn't support NodeList.forEach().")
    }
    ))
}();

<script>
		document.addEventListener("DOMContentLoaded", function () {
			const sections = [
				{ id: 'element1', fadeClass: 'fade-in-left', duration: 3000 },
				{ id: 'element2', fadeClass: 'fade-in-right', duration: 3000 },
				// { id: 'element1', fadeClass: 'fade-in', duration: 3000 }, // Để xuất hiện lần lượt
				// { id: 'element2', fadeClass: 'fade-in', duration: 3000 }, // Để xuất hiện lần lượt

				{ id: 'element3', fadeClass: 'fade-in', duration: 3000 } // Để xuất hiện lần lượt
			];

			function checkVisibility() {
				sections.forEach(section => {
					const elements = document.querySelectorAll(`#${section.id} .${section.fadeClass}`);
					elements.forEach((element, index) => {
						const rect = element.getBoundingClientRect();
						// Kiểm tra xem phần tử có trong viewport không
						if (rect.top < window.innerHeight && rect.bottom > 0) {
							element.classList.add('visible'); // Thêm lớp visible để kích hoạt hiệu ứng
							if (section.fadeClass === 'fade-in') {
								element.style.animationDelay = `${index * 0.2}s`; // Thêm độ trễ cho từng div
							}
						}
					});
				});
			}

			// Lắng nghe sự kiện cuộn
			window.addEventListener('scroll', checkVisibility);
			// Kiểm tra ngay khi tải trang
			checkVisibility();

			// Lắng nghe sự kiện click trên các liên kết với class scroll-link
			document.querySelectorAll('.scroll-link').forEach(link => {
				link.addEventListener('click', function (e) {
					e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

					const targetId = this.getAttribute('href'); // Lấy ID từ href
					const targetElement = document.querySelector(targetId); // Tìm phần tử theo ID

					// Cuộn đến phần tử
					if (targetElement) {
						targetElement.scrollIntoView({ behavior: 'smooth' }); // Cuộn đến phần tử
						checkVisibility(); // Kiểm tra ngay lập tức để áp dụng hiệu ứng
					}
				});
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {

			const blogEntries = document.querySelectorAll('.blog_entry');

			// Tạo observer để theo dõi khi phần tử vào viewport
			const observer = new IntersectionObserver((entries, observer) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						// Thêm class 'show' khi phần tử vào viewport
						entry.target.classList.add('show');
						observer.unobserve(entry.target); // Ngừng theo dõi phần tử sau khi đã hiển thị
					}
				});
			}, {
				threshold: 0.5 // Kích hoạt khi 50% phần tử vào viewport
			});

			// Quan sát tất cả các phần tử blog_entry
			blogEntries.forEach(entry => {
				observer.observe(entry);
			});
		});
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const contents = document.querySelectorAll('.about-content');
			const image = document.getElementById('image1');

			const observer = new IntersectionObserver((entries) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						// Hiện từng phần tử nội dung với độ trễ
						contents.forEach((content, index) => {
							setTimeout(() => {
								content.classList.add('show'); // Thêm lớp show cho nội dung
							}, index * 300); // Độ trễ 300ms cho mỗi phần tử
						});

						// Hiện hình ảnh sau khi nội dung đã xuất hiện
						setTimeout(() => {
							image.classList.add('show'); // Thêm lớp show cho hình ảnh
						}, contents.length * 300); // Hiện hình ảnh sau khi đã hiện tất cả nội dung

						observer.unobserve(entry.target); // Ngừng quan sát phần tử sau khi hiển thị
					}
				});
			}, {
				threshold: 0.1 // Điều chỉnh giá trị này để thay đổi điểm bắt đầu hiện
			});

			// Quan sát phần tử chứa nội dung
			observer.observe(document.getElementById('about-us'));
		});
	</script>

	<script>
		// Hàm kiểm tra khi phần tử vào viewport
		function checkVisibility() {
			const elements = document.querySelectorAll('.single-box');

			elements.forEach(element => {
				const rect = element.getBoundingClientRect();

				if (rect.top < window.innerHeight && rect.bottom >= 0) {
					element.classList.add('show');
				}
			});
		}

		// Gọi hàm khi người dùng cuộn trang
		window.addEventListener('scroll', checkVisibility);

		// Kiểm tra ngay khi tải trang
		document.addEventListener('DOMContentLoaded', checkVisibility);

	</script>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			const newAboutContents = document.querySelectorAll('.new-about-content');
			const newAboutImages = document.querySelectorAll('.new-about-image');

			const observer = new IntersectionObserver((entries) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						// Hiện từng phần tử nội dung với độ trễ
						newAboutContents.forEach((content, index) => {
							setTimeout(() => {
								content.classList.add('show'); // Thêm lớp show cho nội dung
							}, index * 300); // Độ trễ 300ms cho mỗi phần tử
						});

						// Hiện hình ảnh sau khi nội dung đã xuất hiện
						setTimeout(() => {
							newAboutImages.forEach((image, index) => {
								setTimeout(() => {
									image.classList.add('show'); // Thêm lớp show cho hình ảnh
								}, index * 300); // Độ trễ 300ms cho mỗi hình ảnh
							});
						}, newAboutContents.length * 300); // Hiện hình ảnh sau khi đã hiện tất cả nội dung

						observer.unobserve(entry.target); // Ngừng quan sát phần tử sau khi hiển thị
					}
				});
			}, {
				threshold: 0.1 // Điều chỉnh giá trị này để thay đổi điểm bắt đầu hiện
			});

			// Quan sát phần tử chứa nội dung
			observer.observe(document.querySelector('.section_why'));
		});
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', () => {
			// Lấy phần section với class '.awe-section-6'
			const section = document.querySelector('.awe-section-6');

			// Tạo observer để theo dõi khi phần section vào viewport
			const observer = new IntersectionObserver((entries, observer) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						// Thêm class 'show' khi phần section vào viewport
						entry.target.classList.add('show');
						observer.unobserve(entry.target); // Ngừng theo dõi section sau khi đã hiển thị
					}
				});
			}, {
				threshold: 0.5 // Kích hoạt khi 50% phần tử vào viewport
			});

			// Quan sát section
			observer.observe(section);
		});
	</script>
	<script>
		// Chọn tất cả các thẻ card
		const cards = document.querySelectorAll('.card');

		// Hàm kiểm tra xem phần tử đã vào viewport chưa
		const isInViewport = (element) => {
			const rect = element.getBoundingClientRect();
			return rect.top <= window.innerHeight && rect.bottom >= 0;
		};

		// Hàm kích hoạt hiệu ứng
		const handleScroll = () => {
			cards.forEach((card) => {
				if (isInViewport(card)) {
					card.classList.add('show');
				}
			});
		};

		// Lắng nghe sự kiện scroll
		window.addEventListener('scroll', handleScroll);

		// Kích hoạt khi load trang
		handleScroll();
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			// Lấy tất cả các phần tử cần hiệu ứng
			const sections = document.querySelectorAll('.section_effect');

			// Tạo một đối tượng IntersectionObserver để kiểm tra khi phần tử vào viewport
			const observer = new IntersectionObserver((entries, observer) => {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						entry.target.classList.add('active'); // Thêm class "active" để kích hoạt hiệu ứng
						observer.unobserve(entry.target); // Dừng quan sát khi đã kích hoạt hiệu ứng
					}
				});
			}, {
				threshold: 0.5 // Kích hoạt khi phần tử chiếm ít nhất 10% viewport
			});

			// Quan sát tất cả các phần tử cần hiệu ứng
			sections.forEach(section => {
				observer.observe(section);
			});
		});

	</script>

	<script>

		window.onscroll = function () {
			var topLink = document.getElementById("top-link");
			if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
				topLink.style.display = "block"; // Hiển thị nút khi cuộn xuống
			} else {
				topLink.style.display = "none"; // Ẩn nút khi ở đầu trang
			}
		};
	</script>
	<script>
		document.getElementById('top-link').addEventListener('click', function (e) {
			e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

			const targetPosition = 0; // Vị trí đích
			const startPosition = window.scrollY; // Vị trí hiện tại
			const distance = targetPosition - startPosition; // Khoảng cách cần cuộn
			const duration = 1500; // Thời gian cuộn (3 giây)
			let startTime = null; // Thời gian bắt đầu

			function animation(currentTime) {
				if (startTime === null) startTime = currentTime; // Lưu thời gian bắt đầu
				const timeElapsed = currentTime - startTime; // Thời gian đã trôi qua
				const progress = Math.min(timeElapsed / duration, 1); // Tính tỷ lệ hoàn thành

				// Tính vị trí hiện tại dựa trên tỷ lệ hoàn thành
				window.scrollTo(0, startPosition + distance * progress);

				if (timeElapsed < duration) {
					requestAnimationFrame(animation); // Tiếp tục gọi hàm cho đến khi hoàn thành
				}
			}

			requestAnimationFrame(animation); // Bắt đầu hoạt động
		});
	</script>
	<script>
		// Khởi tạo IntersectionObserver
		const observer = new IntersectionObserver((entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					console.log('Ảnh đã vào khung nhìn'); // Kiểm tra trong console
					entry.target.classList.add('visible'); // Thêm lớp 'visible' khi ảnh vào khung nhìn
					observer.unobserve(entry.target); // Ngừng theo dõi ảnh sau khi đã xuất hiện
				}
			});
		}, { threshold: 0.5 });

		const photos = document.querySelectorAll('.footer-photo');
		photos.forEach(photo => {
			observer.observe(photo);
		});

	</script>

	<script>
		let currentSlide = 0;
		let isAnimating = false; // Kiểm soát trạng thái animation

		function changeSlide(direction) {
			if (isAnimating) return; // Nếu đang trong quá trình animation, không cho phép click

			isAnimating = true; // Đánh dấu bắt đầu animation
			const slides = document.querySelectorAll('.slide');
			const totalSlides = slides.length;

			// Cập nhật currentSlide
			if (direction === 1) {
				currentSlide = (currentSlide + 1) % totalSlides; // Chuyển đến slide tiếp theo
			} else {
				currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Chuyển về slide trước
			}

			const offset = -currentSlide * 100; // Tính toán offset
			const slidesContainer = document.querySelector('.slides');

			// Thêm hiệu ứng chuyển động
			slidesContainer.style.transition = 'transform 0.5s ease'; // Khôi phục hiệu ứng chuyển động
			slidesContainer.style.transform = `translateX(${offset}%)`; // Thực hiện chuyển động

			// Cập nhật caption
			slides.forEach((slide, index) => {
				slide.classList.remove('active'); // Xóa lớp active
				if (index === currentSlide) {
					slide.classList.add('active'); // Thêm lớp active cho slide hiện tại
				}
			});

			// Đặt lại trạng thái animation sau khi chuyển động hoàn tất
			setTimeout(() => {
				isAnimating = false; // Cho phép click lại
			}, 300); // Thời gian khớp với thời gian chuyển động
		}

		// Tự động chuyển slide sau mỗi 5 giây
		setInterval(() => changeSlide(1), 5000);

		// Khởi động với slide đầu tiên
		changeSlide(0); // Hiển thị slide đầu tiên
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			document.addEventListener("scroll", function () {
				const elementsRight = document.querySelectorAll(".animate-right");

				// Điểm kích hoạt hiệu ứng
				const triggerBottom = window.innerHeight / 5 * 4;

				elementsRight.forEach((el) => {
					const elementTop = el.getBoundingClientRect().top;

					if (elementTop < triggerBottom) {
						el.classList.add("active"); // Thêm lớp 'active' khi phần tử hiển thị
					}
				});
			});
		});

	</script>


