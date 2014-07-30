{if !$content_only}
		</div>
<!-- Right -->
		<div id="right_column" class="column">{$HOOK_RIGHT_COLUMN}</div>
		<div class="clearblock"></div>
	</div>
</div>
<!-- Footer -->
	<div id="footer_wrapper">
		<div id="footer">
			{$HOOK_FOOTER}
			{if $page_name == 'index'}<!-- [[%FOOTER_LINK]] -->{/if}
		</div>
	</div>
</div>
</div>
	{/if}
</body>
</html>
