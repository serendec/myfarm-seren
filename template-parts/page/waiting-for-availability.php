<div class="page_content_inner">
    <div class="note_wrap">
        <div class="first_visit_rotate">
            <img class="rotate_txt" src="<?= get_assets_directory_uri() ?>/images/form_freevisit_rotate_circle.png">
            <img class="rotate_icon" src="<?= get_assets_directory_uri() ?>/images/form_freevisit_rotate_icon.png">
        </div>
        <div class="note_inner">
            <form class="form_freevisit">

                <div class="form_top_contents">
                    <h2 class="section_ttl_ja"><span>空き待ち登録とは</span></h2>
                    <p class="form_top_txt">
                        お申込みいただくと、ご希望の農園に空きが出た際に順次ご案内いたします。<br>
                        ご案内時期は現在のご契約者様の状況により異なります。<br>
                        詳しい時期についてはお答えできかねますので、予めご了承ください。
                    </p>
                </div>

                <div class="waiting_form_ttl">
                    <span class="waiting_form_ttl_label">農園名</span>
                    <sppan class="waiting_form_ttl_name">いずみ野ファーム</sppan>
                </div>

                <div class="form_group">
                    <label for="name" class="required">お名前</label>
                    <div class="form_wrap">
                        <input type="text" id="name_l" name="name_l" placeholder="姓" required>
                        <input type="text" id="name_f" name="name_f" placeholder="名" required>
                    </div>
                </div>

                <div class="form_group">
                    <label for="kana" class="required">フリガナ</label>
                    <div class="form_wrap">
                        <input type="text" id="kana_l" name="kana_l" placeholder="セイ" required>
                        <input type="text" id="kana_f" name="kana_f" placeholder="メイ" required>
                    </div>
                </div>

                <div class="form_group">
                    <label for="tel" class="required">電話番号</label>
                    <input type="tel" id="tel" name="tel" required>
                </div>

                <div class="form_group">
                    <label for="email" class="required">メールアドレス</label>
                    <input type="email" id="email" name="email" required>
                    <p class="form_note">※ドメイン指定受信をご利用の方は『@myfarm.co.jp』を指定受信に設定してください。</p>
                </div>

                <div class="form_group">
                    <label for="email_confirm" class="required">メールアドレス（確認）</label>
                    <input type="email" id="email_confirm" name="email_confirm" required>
                </div>

                <div class="form_group">
                    <label for="traffic_means">交通手段</label>
                    <div class="form_wrap">
                        <span class="select-wrap">
                            <select name="traffic_means">
                                <option value="" selected>選択してください</option>
                                <option value="車">車</option>
                                <option value="電車">電車</option>
                            </select>
                        </span>
                    </div>


                </div>

                <div class="form_group">
                    <label for="question">見学申し込みのきっかけ</label>
                    <div class="form_radio_wrap">
                        <label>
                            <input type="radio" id="question" name="question" value="インターネット">
                            <span>インターネット</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="SNS">
                            <span>SNS</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="チラシ">
                            <span>チラシ</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="前を通りかかった">
                            <span>前を通りかかった</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="知人からの紹介">
                            <span>知人からの紹介</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="テレビ・ラジオ・雑誌">
                            <span>テレビ・ラジオ・雑誌</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="キャンペーン・イベント等">
                            <span>キャンペーン・イベント等</span>
                        </label>
                        <label>
                            <input type="radio" id="question" name="question" value="その他">
                            <span>その他</span>
                        </label>
                    </div>
                    <div class="textarea_wrap">
                        <p>※上記で選択した項目の詳細をご記入ください</p>
                        <textarea name="question_detail" id="question_detail" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="form_group">
                    <label for="message">ご連絡事項</label>
                    <div class="form_checkbox_wrap">
                        <textarea name="message" id="message" cols="30" rows="10"
                            placeholder="・農園で育てたい野菜/好きな野菜&#13;&#10;・当日聞きたいこと&#13;&#10;・来園情報 例）夫婦で行きます。子供2人と行きます&#13;&#10;・その他伝えておきたいことなど"></textarea>
                    </div>
                </div>

                <div class="form_group">
                    <label for="message">メールマガジン</label>
                    <div>
                        <label class="radio_wrap">
                            <input type="checkbox" name="magazine" id="magazine" value="1"><span
                                for="magazine">メールマガジン</span>
                        </label>
                        <p class="form_note">※チェックすると、ご登録のメールアドレス宛てにマイファームの最新情報メールマガジンをお届けします。</p>
                    </div>
                </div>

                <div class="form_footer">
                    <p class="form_confirm_txt">見学申込みをすることで、<br class="xs"><a>プライバシーポリシー</a><br
                            class="xs">に同意したものとみなされます。</p>
                    <span class="form_btn_wrap">
                        <input class="form_btn" id="submit" type="submit" value="確認画面へ進む">
                    </span>
                </div>

            </form>
        </div>
    </div>
</div>
