<?php ?>

   <nav>
                            <ul id="top_menu">

								<?php
								$menu_data = wp_get_nav_menu_items( 'mainmenu' );

								$home   = array_shift( $menu_data ); // first element is home page.
								$childs = $menu_data;
								?>

                                <li class="current"><a
                                            href="<?php echo ( ( $home->url ) ); ?>"><?php echo( ( $home->title ) ); ?>  </a>
                                </li>

								<?php
								foreach ( $menu_data as $menu_item ) {

									if ( 0 == $menu_item->menu_item_parent && 0 == $menu_item->post_parent ) {  // only roots.
										?>

                                        <li>
                                        <a href="<?php echo( ( $menu_item->url ) ); ?>"><?php echo ( ( $menu_item->title ) ); ?></a>

										<?php
									}

									// children.

									$menu_children = array();
									foreach ( $childs as $v ) {
										if ( $v->menu_item_parent == $menu_item->ID ) {
											array_push( $menu_children, $v );
                                        }
									}

									// if there is child - show it.

									if ( count( $menu_children ) > 0 ) {
                                        ?>

                                        <div class="submenu">
                                            <ul>
												<?php

												foreach ( $menu_children as $menu_child_item ) {
													?>
                                                    <li>
                                                        <a href="<?php echo( ( $menu_child_item->url ) ); ?>"><span><?php echo( ( $menu_child_item->title . '_x_' ) ); ?></span></a>
                                                    </li>
													<?php
												}
												?>
                                            </ul>
                                        </div>
										<?php
									}
									// closing tag for menu's items.
									?>

                                    </li>

									<?php
								}
                                ?>

                            </ul>
                        </nav>