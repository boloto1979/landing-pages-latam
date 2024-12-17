<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LandingPageResource\Pages;
use App\Models\LandingPage;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TagsInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LandingPageResource extends Resource
{
    protected static ?string $model = LandingPage::class;
    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationLabel = 'Landing Pages';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('Landing Page Configuration')
                ->columnSpan('full')
                ->tabs([
                    Tab::make('Configurações Gerais')
                        ->icon('heroicon-o-cog')
                        ->schema([
                            Section::make()
                                ->heading('Informações Básicas')
                                ->description('Preencha os detalhes básicos da landing page.')
                                ->schema([
                                    Grid::make(6)
                                        ->schema([
                                            TextInput::make('title')
                                                ->label('Nome da Landing Page')
                                                ->placeholder('Ex: Página de Promoção')
                                                ->required()
                                                ->columnSpan(3)
                                                ->helperText('Um nome interno para identificar a página.'),

                                            TextInput::make('slug')
                                                ->label('Slug')
                                                ->hint('Usado na URL da página')
                                                ->placeholder('Ex: promocao')
                                                ->required()
                                                ->columnSpan(3)
                                                ->rules(function ($component) {
                                                    $record = $component->getRecord();
                                                    $ignore = $record ? $record->id : 'NULL';
                                                    return ["unique:landing_pages,slug,$ignore"];
                                                }),

                                            ColorPicker::make('primary_color')
                                                ->label('Cor Primária')
                                                ->default('#0ea5e9')
                                                ->columnSpan(3),

                                            ColorPicker::make('secondary_color')
                                                ->label('Cor Secundária')
                                                ->default('#64748b')
                                                ->columnSpan(3),

                                            FileUpload::make('logo')
                                                ->label('Logotipo')
                                                ->directory('landing-page/logo')
                                                ->image()
                                                ->placeholder('Envie seu logo')
                                                ->columnSpan(6)
                                                ->helperText('Use uma imagem em formato PNG ou SVG com fundo transparente.'),

                                            TagsInput::make('tags')
                                                ->label('Tags')
                                                ->separator(',')
                                                ->placeholder('Digite uma tag e pressione Enter')
                                                ->columnSpan(6)
                                                ->helperText('Adicione palavras-chave relevantes para a landing page.'),
                                        ]),
                                ]),
                        ]),
                    Tab::make('Construtor')
                        ->icon('heroicon-o-clipboard-document-list')
                        ->schema([
                            Section::make()
                                ->heading('Conteúdo da Página')
                                ->description('Adicione blocos para montar o conteúdo da sua página.')
                                ->schema([
                                    Builder::make('content')
                                        ->label('Conteúdo da Página')
                                        ->blocks([
                                            Block::make('banner')
                                                ->label('Seção de banner')
                                                ->icon('heroicon-o-photo')
                                                ->schema([
                                                    FileUpload::make('image-banner')
                                                        ->label('Imagem de Fundo')
                                                        ->directory('landing-page/banners')
                                                        ->image()
                                                        ->placeholder('Arraste ou clique para enviar uma imagem'),

                                                    TextInput::make('name-banner')
                                                        ->label('Nome do Banner')
                                                        ->required(),

                                                    Repeater::make('buttons')
                                                        ->label('Botões')
                                                        ->maxItems(4)
                                                        ->schema([
                                                            TextInput::make('name')
                                                                ->label('Nome do Botão')
                                                                ->placeholder('Ex: Saiba Mais')
                                                                ->required(),

                                                            TextInput::make('link')
                                                                ->label('Link do Botão')
                                                                ->placeholder('Ex: https://example.com')
                                                                ->url()
                                                                ->required(),

                                                            ColorPicker::make('color')
                                                                ->label('Cor do Botão')
                                                                ->default('#0ea5e9')
                                                                ->required(),
                                                        ])
                                                        ->helperText('Adicione até 4 botões com nomes, links e cores personalizados.'),
                                                ]),

                                            Block::make('text-block')
                                                ->label('Seção para bloco de Texto')
                                                ->icon('heroicon-o-bars-3-bottom-left')
                                                ->schema([
                                                    Textarea::make('title-block-text')
                                                        ->label('Texto')
                                                        ->placeholder('Escreva aqui...')
                                                        ->required(),

                                                    Select::make('title-block-text-color')
                                                        ->label('Cor do Texto')
                                                        ->options([
                                                            'text-black' => 'Preto',
                                                            'text-white' => 'Branco',
                                                        ])
                                                        ->default('text-black'),
                                                ]),

                                            Block::make('blog')
                                                ->label('Seção de posts do blog')
                                                ->icon('heroicon-o-bold')
                                                ->schema([
                                                    TextInput::make('blog-section-title')
                                                        ->label('Título da Seção')
                                                        ->placeholder('Ex: Últimas Notícias, Blog, Nossos Artigos')
                                                        ->required()
                                                        ->default('Blog')
                                                        ->helperText('Defina o título exibido no cabeçalho da seção do blog.'),

                                                    Select::make('posts_count')
                                                        ->label('Quantidade de Posts')
                                                        ->options([
                                                            3 => '3 Posts',
                                                            6 => '6 Posts (Padrão)',
                                                            9 => '9 Posts',
                                                            12 => '12 Posts',
                                                        ])
                                                        ->default(6)
                                                        ->helperText('Escolha o número de posts a serem exibidos na seção.'),
                                                ]),

                                            Block::make('video')
                                                ->label('Seção de Vídeo')
                                                ->icon('heroicon-o-video-camera')
                                                ->schema([
                                                    TextInput::make('video_title')
                                                        ->label('Nome do Vídeo')
                                                        ->placeholder('Ex: Video de apresentação')
                                                        ->required()
                                                        ->helperText('Insira o nome descritivo do vídeo.'),

                                                    TextInput::make('video_url')
                                                        ->label('Link do Vídeo')
                                                        ->placeholder('Ex: https://www.youtube.com/watch?v=example')
                                                        ->url()
                                                        ->required()
                                                        ->helperText('Insira um link válido para o vídeo.'),
                                                ]),

                                            Block::make('challenges')
                                                ->label('Seção de desafios')
                                                ->icon('heroicon-o-document-text')
                                                ->schema([
                                                    TextInput::make('challenges-title')
                                                        ->label('Título da Seção')
                                                        ->placeholder('Ex: Últimas Desafios, Challenges, Nossos Desafios')
                                                        ->helperText('Defina o título exibido no cabeçalho da seção de desafios.')
                                                        ->default('Desafios')
                                                        ->required(),

                                                    Select::make('selected_challenges')
                                                        ->label('Selecione os Desafios')
                                                        ->options([
                                                            'challenge1' => 'Resolver o Cubo Mágico',
                                                            'challenge2' => 'Maratona de Codificação',
                                                            'challenge3' => 'Criação de Protótipos Inovadores',
                                                            'challenge4' => 'Hackathon de Sustentabilidade',
                                                            'challenge5' => 'Desafio de Design Minimalista',
                                                        ])
                                                        ->multiple()
                                                        ->searchable()
                                                        ->placeholder('Escolha um ou mais desafios...')
                                                        ->helperText('Você pode selecionar múltiplos desafios.'),
                                                ]),

                                            Block::make('evaluators')
                                                ->label('Seção de avaliadores')
                                                ->icon('heroicon-o-users')
                                                ->schema([
                                                    TextInput::make('evaluators-title')
                                                        ->label('Título da Seção')
                                                        ->placeholder('Escreva aqui...')
                                                        ->helperText('Defina o título exibido no cabeçalho da seção de avaliadores.')
                                                        ->required(),

                                                    Select::make('selected_evaluators')
                                                        ->label('Selecione os Avaliadores')
                                                        ->options([
                                                            'evaluator1' => 'Dr. João Silva - Especialista em IA',
                                                            'evaluator2' => 'Maria Oliveira - Designer Gráfica',
                                                            'evaluator3' => 'Carlos Andrade - Engenheiro de Software',
                                                            'evaluator4' => 'Ana Costa - Professora de Física',
                                                            'evaluator5' => 'Pedro Lima - Gestor de Projetos',
                                                        ])
                                                        ->multiple()
                                                        ->searchable()
                                                        ->placeholder('Escolha um ou mais avaliadores...')
                                                        ->helperText('Você pode selecionar múltiplos avaliadores.'),
                                                ]),
                                        ]),
                                ]),
                        ]),
                    Tab::make('Metadados')
                        ->icon('heroicon-o-globe-alt')
                        ->schema([
                            Section::make()
                                ->heading('SEO')
                                ->description('Defina os metadados para melhorar a relevância da página nos mecanismos de busca.')
                                ->schema([
                                    TextInput::make('meta_title')
                                        ->label('Meta Titulo')
                                        ->placeholder('Título para SEO')
                                        ->required(),

                                    TagsInput::make('meta_tags')
                                        ->label('Meta Tags')
                                        ->separator(',')
                                        ->placeholder('Digite uma tag e pressione Enter')
                                        ->helperText('Adicione palavras-chave relevantes para a landing page.'),

                                    Textarea::make('meta_description')
                                        ->label('Meta Descrição')
                                        ->placeholder('Escreva uma descrição resumida (máx 160 caracteres).')
                                        ->rows(3)
                                        ->maxLength(160)
                                        ->columnSpanFull()
                                        ->helperText('A descrição será usada nos mecanismos de busca. Mantenha clara e objetiva.'),
                                ]),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Nome da Landing Page')
                    ->sortable()
                    ->searchable()
                    ->limit(30),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->searchable()
                    ->limit(30),

                TextColumn::make('tags')
                    ->label('Tags')
                    ->formatStateUsing(function ($state) {
                        return is_array($state) ? implode(', ', $state) : $state;
                    })
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->tooltip('Visualizar Landing Page'),
                Tables\Actions\EditAction::make()->tooltip('Editar Landing Page'),
                Tables\Actions\DeleteAction::make()->tooltip('Excluir Landing Page')->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->color('danger'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLandingPages::route('/'),
            'create' => Pages\CreateLandingPage::route('/create'),
            'edit'   => Pages\EditLandingPage::route('/{record}/edit'),
        ];
    }
}
