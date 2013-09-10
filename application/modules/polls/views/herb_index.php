<div class="poll">
                   
                	<h4>$rs[title]</h4>
 
                    <div>
                    	<?php foreach($result as $key => $item): ?>
							<p><input type="radio" name="poll" value="$rs[id]"/><label><?php echo $item[ans] ?></label></p>
						<?php endforeach ?>
                        <p><input class="input-button" type="submit" name="pollBtn2" value="ตกลง" /><input class="input-button" type="button" name="viewBtn2" value="ดูผลโหวต" /></p>
                        <input type="hidden" name="id" value="$rs[id]" /></form>
                    </div>
  					
                    <div class="poll-result" style="display:none;">
                    	asdf
                    </div>
</div>